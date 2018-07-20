var programFormFields = function () {

    return [
      {
        type: 'base-text-input',
        label: 'Program Name:',
        name: 'name',
        placeholder: ''
      },
      {
        type: 'base-text-area',
        label: 'Program Description:',
        name: 'description',
        placeholder: ''
      },
      {
        type: 'base-text-area',
        label: 'Curriculum Description:',
        name: 'curriculum_description',
        placeholder: ''
      },
      {
        type: 'base-text-input',
        label: 'Video Link:',
        name: 'video_link',
        placeholder: ''
      },
      {
        type: 'base-text-input',
        label: 'Form Link:',
        name: 'form_link',
        placeholder: ''
      },
      {
        type: 'base-file-input',
        label: 'Program Picture',
        name: 'picture',
        placeholder: ''
      }
    ]

}

module.exports = programFormFields
