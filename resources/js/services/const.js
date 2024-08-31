export const VOTE_TYPES = {
  UP: 'UP',
  DOWN: 'DOWN',
}

export const JOIN_REQUEST_STATUSES = {
  PENDING: {
    value: 'PENDING',
    toShow: 'Jamoaga qo\'shilmoqchi',
    color: 'blue',
  },
  CANCELED: {
    value: 'CANCELED',
    toShow: 'Bekor qilish',
    color: 'red',
  },
  ACCEPTED: {
    value: 'ACCEPTED',
    toShow: 'Qabul qilish',
    color: 'green',
  },
  REJECTED: {
    value: 'REJECTED',
    toShow: 'Rad qilish',
    color: 'red',
  },
  LEAVED: {
    value: 'LEAVED',
    toShow: 'Jamoni tark etmoqchi',
    color: 'gray',
  },
};
