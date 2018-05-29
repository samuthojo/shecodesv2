export default class Program {

  static getPrograms() {
    return axios.get('/admin/api/programs');
  }


}
