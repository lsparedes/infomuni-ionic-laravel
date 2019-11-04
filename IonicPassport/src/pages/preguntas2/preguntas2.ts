import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

@IonicPage()
@Component({
  selector: 'page-preguntas2',
  templateUrl: 'preguntas2.html',
})
export class Preguntas2Page {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
    console.log("Ventana Pregunta 1: " +  this.navParams.get('respuesta1'));
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad Preguntas2Page');
  }

}
