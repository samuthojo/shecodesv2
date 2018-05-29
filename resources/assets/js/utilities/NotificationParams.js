export class NotificationParams {

  constructor() {
    this.showAsync = false

    this.successMessage = ''

    this.errorMessage = ''

    this.showSuccess = false

    this.showError = false

    this.showNotificationModal = false
  }

  showAsyncNotification() {
    this.showAsync = true

    this.showNotificationModal = true
  }

  showSuccessNotification(message) {
    this.showAsync = false

    this.successMessage = message

    this.showSuccess = true
  }

  showErrorNotification(message) {
    this.showAsync = false

    this.errorMessage = message

    this.showError = true
  }

}
