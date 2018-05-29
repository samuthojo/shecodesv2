export default class Crud {

  static post(url, form) {

    form.showProgress()

    return new Promise((resolve, reject) => {

      form.submit('POST', url)

          .then(response => {

            form.showSuccess('Created Successfully')

            form.closeNotification()

            resolve(response)

          })

          .catch(error => {

            form.showError(Crud.getErrorMessage(error.response.status))

            form.closeNotification()

            reject(error)

          })

    })

  }

  static patch(url, form) {

    form.showProgress()

    return new Promise((resolve, reject) => {

      form.submit('PATCH', url)

          .then(response => {

            form.showSuccess('Updated Successfully')

            form.closeNotification()

            resolve(response)

          })

          .catch(error => {

            form.showError(Crud.getErrorMessage(error.response.status))

            form.closeNotification()

            reject(error)

          })

    })

  }

  static updateFile(url, file) {

    let form = new Form({})

    form.showProgress()

    let formData = new FormData()

    formData.append('picture', file)

    formData.append('_method', 'PATCH')

    return new Promise((resolve, reject) => {

     axios.post('POST', url)

          .then(response => {

            form.showSuccess('Picture Updated Successfully')

            form.closeNotification()

            resolve(response)

          })

          .catch(error => {

            form.showError(Crud.getErrorMessage(error.response.status))

            form.closeNotification()

            reject(error)

          })

    })

  }

  static archive(url) {

    let form = new Form({})

    form.showProgress()

    return new Promise((resolve, reject) => {

     axios.patch(url)

          .then(response => {

            form.showSuccess('Sent to Archives')

            form.closeNotification()

            resolve(response)

          })

          .catch(error => {

            form.showError(Crud.getErrorMessage(error.response.status))

            form.closeNotification()

            reject(error)

          })

    })

  }

  static deleteEntity(url) {

    let form = new Form({})

    form.showProgress()

    return new Promise((resolve, reject) => {

      form.deleteEntity(url)

          .then(response => {

            form.showSuccess('Deleted Successfully')

            form.closeNotification()

            resolve(response)

          })

          .catch(error => {

            form.showError(Crud.getErrorMessage(error.response.status))

            form.closeNotification()

            reject(error)

          })

    })

  }

  static getErrorMessage(status) {

      switch(status) {

        case 422: return 'The given data was invalid'

        case 413: return 'The picture is too large, maximum supported is 2MB'

        default: return 'An error occured, request failed'

     }

   }

 }
