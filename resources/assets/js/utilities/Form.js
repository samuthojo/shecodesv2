import { Errors } from './Errors.js';

import { NotificationParams } from './NotificationParams.js';

export default class Form {

  constructor(data) {

    this.originalData = data;

    for(let field in data) {
      this[field] = data[field];
    }

    this.errors = new Errors();

    this.notification = new NotificationParams();

  }

  submit(requestType, url) {
    requestType = _.toLower(requestType);
    return new Promise((resolve, reject) => {
      axios[requestType](url, this.data())
        .then(response => {
          this.onSuccess()
          resolve(response)
        })
        .catch(error => {
          this.onFail(error)
          reject(error)
        });
    })
  }

  deleteEntity(url) {
    return new Promise((resolve, reject) => {
      axios.delete(url)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          reject(error)
        });
    })
  }

  data() {
    let data = _.clone(this);

    delete data.originalData;

    delete data.errors;

    delete data.notification;

    return data;
  }

  onSuccess() {
    
    this.errors.clear();

  }

  reset() {
    for(let field in this.originalData) {
      this[field] = "";
    }
  }

  onFail(error) {
    this.errors.record(error.response.data.errors);
  }

  showProgress() {
    this.notification.showAsyncNotification()
  }

  showSuccess(message) {
    this.notification.showSuccessNotification(message)
  }

  showError(message) {
    this.notification.showErrorNotification(message)
  }

  closeNotification() {

    setTimeout(() => this.notification = new NotificationParams(), 2000)

  }

}
