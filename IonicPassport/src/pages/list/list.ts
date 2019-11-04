import { Component } from '@angular/core';
import {  NavController, NavParams, App, ToastController } from 'ionic-angular';

import { Http } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import { DetalleseventosPage } from '../detalleseventos/detalleseventos';


@Component({
  selector: 'page-list',
  templateUrl: 'list.html'
})

export class ListPage {

    eventos:any;
    data:Observable<any>;

    constructor(public navCtrl: NavController,
                public navParams: NavParams,
                public app: App,
                public http: Http,
                private toastCtrl:ToastController) {

                  this.http.get('http://localhost:8000/api/events')
                   .map(response => response.json())
                   .subscribe(
                      data =>
                      {
                        this.eventos = data;
                        console.log(data);
                      },
                      err =>
                      {
                        console.log("Oops!");
                        this.presentToast("No existen registros aún");
                      }
                  );
      }

  presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 2000
    });
    toast.present();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ListPage');
  }

  detalles(id) {
    this.navCtrl.push(DetalleseventosPage,{valor: id});
  }

}
