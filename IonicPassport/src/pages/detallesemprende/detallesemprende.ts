import { Component } from '@angular/core';
import { NavController, NavParams, App, ToastController} from 'ionic-angular';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';

//@IonicPage()
@Component({
  selector: 'page-detallesemprende',
  templateUrl: 'detallesemprende.html',
})

export class DetallesemprendePage {

 id = this.navParams.get('valor');
 detalles:any;
 data:Observable<any>;
 public nombre:any;

  constructor(public navCtrl: NavController,
              public navParams: NavParams,
              public app: App,
              public http: Http,
              private toastCtrl:ToastController) {

              console.log("El valor del id seleccionado es: "+this.id);


              this.http.get('http://integralgest.cl/infomuni/api/emprende/'+this.id)
                 .map(response => response.json())
                 .subscribe(data =>
                    {
                      this.detalles = data;
                      this.nombre = data[0].nombre;
                      console.log(data);
                    },
                    err => {
                      console.log("Oops!");
                      this.presentToast("No existen detalles para este emprendedor");
                    }
                 );
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DetallesemprendePage');
  }

  presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 2000
    });
    toast.present();
  }

}
