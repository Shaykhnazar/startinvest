import { ElMessage } from 'element-plus'

export function useElMessage() {
  const messageByType = (msg, type) => {
    ElMessage({
      message: msg,
      type: type,
    })
  }

  return {
    success: (msg) => messageByType(msg, 'success'),
    warning: (msg) => messageByType(msg, 'warning'),
    error: (msg) => messageByType(msg, 'error'),
    info: (msg) => messageByType(msg, 'info'),
  }
}

export function useFormatFriendlyDate() {

  const formatFriendlyDate = (isoDateString) => {
    if (!isoDateString) {
      return 'Invalid Date';
    }

    const date = new Date(isoDateString);
    if (isNaN(date.getTime())) {
      return 'Invalid Date';
    }

    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Intl.DateTimeFormat('en-US', options).format(date);
  }

  return {
    formatFriendlyDate
  }
}
