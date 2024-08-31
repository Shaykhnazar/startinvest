import { computed } from 'vue';
import { useUserStore } from '@/stores/UserStore.js';
import api from '@/services/api.js';
import { useElMessage } from '@/Composables/helpers.js';
import { usePage } from '@inertiajs/vue3';
import { JOIN_REQUEST_STATUSES } from '@/services/const.js';

export function useStartupTeamActions(startup) {
  const { success, info, warning } = useElMessage();
  const userStore = useUserStore();

  const showConfirmationDialog = (callback, confirmText) => {
    if (window.confirm(confirmText)) {
      callback();
    }
  };

  const handleJoinRequest = (startupId) => {
    if (joinPreCheck()) {
      if (userStore.hasPendingJoinRequest(startupId)) {
        showConfirmationDialog(() => cancelJoining(startupId), "So'rovni bekor qilmoqchimisiz?");
      } else if (userStore.isContributor(startupId)) {
        showConfirmationDialog(() => leaveTeam(startupId), "Jamoani tark etmoqchimisiz?");
      } else {
        showConfirmationDialog(() => sendJoinRequest(startupId), "Jamoaga qo'shilish uchun so'rov yuborishni xohlaysizmi?");
      }
    }
  };

  const sendJoinRequest = async (startupId) => {
    try {
      await api.startups.sendRequest(startupId, {
        status: JOIN_REQUEST_STATUSES.PENDING.value,
      });
      success("Jamoaga qo'shilish so'rovi muvaffaqiyatli yuborildi!");
      refreshJoinRequests();
    } catch (error) {
      console.error("Jamoaga qo'shilish so'rovini yuborishda xato:", error);
      info("Jamoaga qo'shilish so'rovini yuborishda xatolik");
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
      warning("Jamoaga qo'shilish so'rovi bekor qilindi!");
      refreshJoinRequests();
    } catch (error) {
      console.error("Error cancel joining:", error);
    }
  };

  const leaveTeam = async (startupId) => {
    try {
      await api.startups.sendRequest(startupId, {
        status: JOIN_REQUEST_STATUSES.LEAVED.value,
      });
      success("Jamoani tark etish so'rovi jo'natildi!");
      refreshJoinRequests();
    } catch (error) {
      console.error("Error leaving team:", error);
    }
  };

  const refreshJoinRequests = () => {
    userStore.updateUserJoinRequests(usePage().props.auth.user.data.joinRequests);
  };

  const buttonText = computed(() => {
    const hasPendingRequest = userStore.hasPendingJoinRequest(startup.id);
    const isContributor = userStore.isContributor(startup.id);

    if (userStore.isGuest) {
      return "Jamoaga qo'shilish";
    } else if (hasPendingRequest) {
      return "So'rovni bekor qilish ❌";
    } else if (isContributor) {
      return "Jamoani tark etish";
    } else {
      return "Jamoaga qo'shilish";
    }
  });

  function joinPreCheck() {
    if (userStore.isGuest) {
      info("Iltimos, so'rov yuborish uchun tizimga kiring");
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
