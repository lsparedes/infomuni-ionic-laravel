import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, App,ToastController, LoadingController,Loading} from 'ionic-angular';
import { Camera, CameraOptions } from '@ionic-native/camera';
import { Observable } from 'rxjs/Observable';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

import { EvidenciaPage } from '../evidencia/evidencia';

import { FormGroup, FormBuilder, Validators } from "@angular/forms";

import { AuthProvider } from '../../providers/auth/auth';
import { UserProvider } from '../../providers/user/user';





@IonicPage()
@Component({
  selector: 'page-denuncia',
  templateUrl: 'denuncia.html',
})

export class DenunciaPage {

  datos:FormGroup;
  tipo:any;
  data:Observable<any>;
  public userDetails : any;
  public todo:any;
  comentario:any;
  publicaciones:any;
  tipos: any;
  base64Image : string;
  loading: Loading;
  user: any;

  constructor(public navCtrl: NavController,
              public navParams: NavParams,
              public app: App,
              public http: Http,
              public formBuilder: FormBuilder,
              private toastCtrl:ToastController,
              public camera: Camera,
              public loadingCtrl: LoadingController,
              private authService: AuthProvider,
              private userService: UserProvider) {

                this.datos =  formBuilder.group({
                  comentario: ['',[Validators.required,Validators.maxLength(140)]],
                  tipo: ['', Validators.required],
                });

                // const data = JSON.parse(localStorage.getItem('userData'));
                // this.userDetails = data.userData;

                this.http.get('http://integralgest.cl/infomuni/api/tipo')
                                   .map(response => response.json())
                                   .subscribe(data =>
                                      {
                                        this.tipos = data;
                                        console.log(data);
                                      },
                                      err => {
                                        console.log("Oops! Problemas en la consulta de tipos");
                                      }
                                  );
              }

  async ionViewCanEnter () {
      let isAuthenticated = await this.authService.checkIsAuthenticated();
      return isAuthenticated;
  }

  getUser ()
  {

    this.userService.getUserInfo()
      .then((response: any) => {

        this.user = response;
        console.log("el id es: "+this.user.id);
      })
      .catch(err => {


      })
  }

  presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 2000,
    });
    toast.present();
  }

  takePicture(){
    const options: CameraOptions = {
      quality: 100,
      destinationType: this.camera.DestinationType.DATA_URL,
      encodingType: this.camera.EncodingType.JPEG,
      mediaType: this.camera.MediaType.PICTURE,
      correctOrientation: true
    }

    this.camera.getPicture(options).then((imageData) => {
      this.base64Image = 'data:image/jpeg;base64,' + imageData;
    }, (err) => {

    });
  }

  openGallery(){
    const options: CameraOptions = {
      quality: 20,
      destinationType: this.camera.DestinationType.DATA_URL,
      encodingType: this.camera.EncodingType.JPEG,
      mediaType: this.camera.MediaType.PICTURE,
      sourceType: this.camera.PictureSourceType.PHOTOLIBRARY,
      correctOrientation: true
    }
    this.camera.getPicture(options).then((imageData) => {
      this.base64Image = 'data:image/jpeg;base64,' + imageData;
    }, (err) => {

    });
  }

  uploadImage(){
       // this.loading = this.loadingCtrl.create({
       //    content: 'Subiendo...',
       // });

       // this.loading.present();
       var url= 'http://integralgest.cl/infomuni/api/denuncia_create';
       let postData= new FormData();

       //postData.append('file', this.base64Image);
       postData.append('username',this.user.id);//necesito usar el nombre de la persona logeada
       postData.append('comentario',this.comentario);
       postData.append('tipo',this.tipo);
       this.data = this.http.post(url, postData);

       this.data.subscribe((data) => {
         console.log(data);
         this.presentToast("Publicación realizada correctamente!");
         // this.loading.dismissAll();
         // this.reload();
         this.navCtrl.push(EvidenciaPage);
       })
  }

  // reload(){
  //   this.http.get('http://integralgest.cl/infomuni/api/denuncia')
  //        .map(response => response.json())
  //        .subscribe(data =>
  //           {
  //             this.publicaciones = data;
  //             console.log(data);
  //           },
  //           err => {
  //             console.log("Oops!");
  //           }
  //       );
  //}

  ionViewDidLoad() {
    console.log('ionViewDidLoad DenunciaPage');
      this.getUser();

  }


}
