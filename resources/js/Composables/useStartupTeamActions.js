import { computed } from 'vue';
import { useUserStore } from '@/stores/UserStore.js';
import api from '@/services/api.js';
import { useElMessage } from '@/Composables/helpers.js';
import { usePage } from '@inertiajs/vue3';
import { JOIN_REQUEST_STATUSES } from '@/services/const.js';
import { wTrans } from 'laravel-vue-i18n'

export function useStartupTeamActions(startup) {
  const { success, info, warning } = useElMessage();
  const userStore = useUserStore();

  const showConfirmationDialog = (callback, confirmTextKey) => {
    const confirmText = t(confirmTextKey);
    if (window.confirm(confirmText)) {
      callback();
    }
  };

  const handleJoinRequest = (startupId) => {
    if (joinPreCheck()) {
      if (userStore.hasPendingJoinRequest(startupId)) {
        showConfirmationDialog(
          () => cancelJoining(startupId),
          wTrans('site.startup.requests.cancel_request_confirmation')
        );
      } else if (userStore.isContributor(startupId)) {
        showConfirmationDialog(
          () => leaveTeam(startupId),
          wTrans('site.startup.requests.leave_team_confirmation')
        );
      } else {
        showConfirmationDialog(
          () => sendJoinRequest(startupId),
          wTrans('site.startup.requests.send_join_request_confirmation')
        );
      }
    }
  };

  const sendJoinRequest = async (startupId) => {
    try {
      await api.startups.sendRequest(startupId, {
        status: JOIN_REQUEST_STATUSES.PENDING.value,
      });
      success(wTrans('site.startup.requests.join_request_success'));
      refreshJoinRequests();
    } catch (error) {
      console.error("Error sending join request:", error);
      info(wTrans('site.startup.requests.join_request_error'));
    }
  };

  const cancelJoining = async (startupId) => {
    try {
      const request = userStore.getJoinRequest(startupId);
      await api.startups.handleJoinRequest(startupId, {
        requestId: request?.id,
        fromStatus: request?.status,
        toStatus: JOIN_REQUEST_STATUSES.CANCELED.value,
      });
      warning(wTrans('site.startup.requests.cancel_join_request_success'));
      refreshJoinRequests();
    } catch (error) {
      console.error("Error canceling join request:", error);
      info(wTrans('site.startup.requests.join_request_error'));
    }
  };

  const leaveTeam = async (startupId) => {
    try {
      await api.startups.sendRequest(startupId, {
        status: JOIN_REQUEST_STATUSES.LEAVED.value,
      });
      success(wTrans('site.startup.requests.leave_team_request_success'));
      refreshJoinRequests();
    } catch (error) {
      console.error("Error leaving team:", error);
      info(wTrans('site.startup.requests.join_request_error'));
    }
  };

  const refreshJoinRequests = () => {
    const pageProps = usePage().props;
    if (pageProps.auth && pageProps.auth.user && pageProps.auth.user.data) {
      userStore.updateUserJoinRequests(pageProps.auth.user.data.joinRequests);
    }
  };

  const buttonText = computed(() => {
    const hasPendingRequest = userStore.hasPendingJoinRequest(startup.id);
    const isContributor = userStore.isContributor(startup.id);

    if (userStore.isGuest) {
      return wTrans('site.startup.requests.button.join');
    } else if (hasPendingRequest) {
      return wTrans('site.startup.requests.button.cancel_request');
    } else if (isContributor) {
      return wTrans('site.startup.requests.button.leave_team');
    } else {
      return wTrans('site.startup.requests.button.join');
    }
  });

  function joinPreCheck() {
    if (userStore.isGuest) {
      info(wTrans('site.startup.requests.login_required'));
      return false;
    }
    return true;
  }

  return {
    handleJoinRequest,
    sendJoinRequest,
    cancelJoining,
    leaveTeam,
    buttonText,
  };
}
