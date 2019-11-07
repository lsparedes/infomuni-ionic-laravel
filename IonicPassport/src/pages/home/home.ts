import { Component } from '@angular/core';
import { NavController, AlertController,ToastController } from 'ionic-angular';

import { AuthProvider } from '../../providers/auth/auth';
import { UserProvider } from '../../providers/user/user';

import { DetalleshomePage } from '../detalleshome/detalleshome';

import { Observable } from 'rxjs/Observable';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  loading: boolean = false;
  user: any;
  data:Observable<any>;
  public userDetails : any;
  public todo:any;

  constructor(public navCtrl: NavController,
    private alertCtrl: AlertController,
    private authService: AuthProvider,
    private userService: UserProvider,
    public http: Http,
    private toastCtrl:ToastController
  ) {

    this.http.get('http://integralgest.cl/api/todo')
                  .map(response => response.json())
                  .subscribe(data =>
                     {
                       this.todo = data;

                       console.log(data);
                     },
                     err => {console.log("Oops!");
                     this.presentToast("No existen registros aún");
                   }
                 );




  }

  presentToast(msg) {
  let toast = this.toastCtrl.create({
    message: msg,
    duration: 2000,
  //  showCloseButton: true,
  //  closeButtonText: "Ok"
  });
  toast.present();
}

  async ionViewCanEnter () {
    let isAuthenticated = await this.authService.checkIsAuthenticated();
    return isAuthenticated;
  }

  ionViewDidLoad() {
    this.getUser();
  }

  getUser ()
  {
    this.loading = true;
    this.userService.getUserInfo()
      .then((response: any) => {
        this.loading = false;
        this.user = response;
        console.log("el id es: "+this.user.id);
      })
      .catch(err => {
        this.loading = false;
        let alert = this.alertCtrl.create({ title: 'Error', message: 'Error on get user info', buttons: ['Ok'] });
        alert.present();
      })
  }

  detalles(id, tipo) {
    this.navCtrl.push(DetalleshomePage,{valor: id, valor2:tipo});
  }

}
