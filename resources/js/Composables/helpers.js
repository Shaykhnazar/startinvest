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
