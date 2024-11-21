export const VOTE_TYPES = {
  UP: 'UP',
  DOWN: 'DOWN',
}

export const JOIN_REQUEST_STATUSES = {
  PENDING: {
    value: 'PENDING',
    toShow: 'site.startup.requests.statuses.pending',
    color: 'blue',
  },
  CANCELED: {
    value: 'CANCELED',
    toShow: 'site.startup.requests.statuses.canceled',
    color: 'red',
  },
  ACCEPTED: {
    value: 'ACCEPTED',
    toShow: 'site.startup.requests.statuses.accepted',
    color: 'green',
  },
  REJECTED: {
    value: 'REJECTED',
    toShow: 'site.startup.requests.statuses.rejected',
    color: 'red',
  },
  LEAVED: {
    value: 'LEAVED',
    toShow: 'site.startup.requests.statuses.leaved',
    color: 'gray',
  },
};
