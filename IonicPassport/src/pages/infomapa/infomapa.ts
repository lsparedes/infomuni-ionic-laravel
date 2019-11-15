import { Component, ViewChild, ElementRef } from '@angular/core';
import { NavController, NavParams} from 'ionic-angular';
//import { Observable } from 'rxjs/Observable';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

declare var google;


//@IonicPage()
@Component({
  selector: 'page-infomapa',
  templateUrl: 'infomapa.html',
})
export class InfomapaPage {


  map:any;
  puntos:any;
  @ViewChild('map')mapElement:ElementRef;

  constructor(public navCtrl: NavController, public navParams: NavParams,public http: Http) {
  }

  ionViewDidLoad() {
    this.map = this.loadMap();
  }

  loadMap(){



    var map = new google.maps.Map(this.mapElement.nativeElement,{
      zoom: 13,
      center: {lat: -36.786790, lng: -73.106538},
      disableDefaultUI: false,
      mapTypeControl: false,
      scaleControl: true,
      fullscreenControl: false,
      zoomControl: false,
      streeViewControl: true,

    });

    this.http.get('http://integralgest.cl/infomuni/api/mapa')
         .map(response => response.json())
         .subscribe(data =>
            {
              this.puntos = data;
              console.log("fuera for <br>");
              console.log(data);

              data.forEach(function(element: { lat: string; lng: string; tipo: string; DisplayName: string; ChaserLocation: string; titulo: string; dia_inicio: string; dia_termino: string; horario_apertura: string; horario_cierre: string; contacto: string; paginaweb: string; }) {
                console.log("dentro for <br>");
                console.log(element);

                if(element.lat!="" && element.lng!="" )
                {
                      console.log("lat: "+element.lat+" / lng "+element.lng);

                      var pinIcon = new google.maps.MarkerImage(
                          "../../assets/imgs/"+element.tipo+".png",
                          null, /* size is determined at runtime */
                          null, /* origin is 0,0 */
                          null, /* anchor is bottom center of the scaled image */
                          new google.maps.Size(68, 68)
                      );

                     var marker = new google.maps.Marker({
                         position: {lat: parseFloat(element.lat), lng: parseFloat(element.lng)},
                         animation: google.maps.Animation.DROP,
                         title: element.DisplayName+','+ element.ChaserLocation,
                         //icon:  "../../assets/imgs/warning.png",
                         icon:  pinIcon,
                         map: map
                       });

                       marker.addListener('click', function() {

                         var infowindow = new google.maps.InfoWindow({
                           content: '<div id="content">'+

                                      '<span style="font-size:20px"><b>'+element.titulo+'</b></span>'+

                                      '<hr>'+
                                      '<span><b>Horario: </b>'+element.dia_inicio+' a '+element.dia_termino+' , '+element.horario_apertura+' - '+element.horario_cierre+'</span><br>'+
                                      '<span><b>Contacto: </b>'+element.contacto+'</span><br>'+
                                      '<span><b>Sitio Web: </b>'+element.paginaweb+'</span><br>'+
                                      //'<span><b>Tipo: </b>'+element.tipo+'</span><br>'+
                                      '<div id="bodyContent">'+
                                      '</div>'+
                                    '</div>'
                         });
                         infowindow.open(map, marker);
                       });
               }
              });




            }
         );



    return map;
  }



}
