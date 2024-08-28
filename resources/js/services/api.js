import axios from 'axios'
import _ from 'lodash'

export default {
  ideas: {
    add: (data) => api().post('ideas/add', data),
    show: (id, data) => api().get(`ideas/${id}`, data),
    edit: (id, data) => api().put(`ideas/edit/${id}`, data),
    delete: (id) => api().delete(`ideas/delete/${id}`),
    vote: (id, data) => api().put(`ideas/vote/${id}`, data),
    comment: (id, data) => api().post(`ideas/comment/${id}`, data),
    favorite: (id, data) => api().put(`ideas/favorite/${id}`, data),
  },
  messages: {
    getMessages: (friendId) => api().get(`messages/${friendId}`),
    sendMessage: (friendId, data) => api().post(`messages/${friendId}`, data),
  },
  startups: {
    sendRequest: (startupId, data) => api().post(`startups/${startupId}/send-request`, data),
    handleJoinRequest: (startupId, data) => api().patch(`startups/${startupId}/accept-request`, data),
    removeContributor: (startupId, data) => api().patch(`startups/${startupId}/remove-contributor`, data),
  },
}

function api() {
  const instance = axios.create({
    baseURL: window.location.origin + '/api/v1',
    headers: {
      Accept: 'application/json',
      // Authorization: 'Bearer ' + store.getters['auth/token'],
    },
  })

  instance.interceptors.response.use(
    (response) => {
      return response
    },
    (error) => {
      let errors = error
      if (error.response?.data?.errors) {
        errors = _.values(error.response.data.errors).join('<br>')
      }
      console.log(errors)

      return Promise.reject(error)
    }
  )

  return instance
}
