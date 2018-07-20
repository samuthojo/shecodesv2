export default class Program {

  constructor() {
    this.name = ''
    this.description = ''
    this.curriculum_description = ''
    this.video_link = ''
    this.form_link = ''
  }

  static getPrograms() {
    return axios.get('/admin/api/programs');
  }

}
