import { Component, ViewChild, ElementRef } from '@angular/core';
import { IonicPage, NavController, NavParams} from 'ionic-angular';
import { Observable } from 'rxjs/Observable';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

declare var google;


@IonicPage()
@Component({
  selector: 'page-infomapa',
  templateUrl: 'infomapa.html',
})
export class InfomapaPage {


  map:any;
  @ViewChild('map')mapElement:ElementRef;

  constructor(public navCtrl: NavController, public navParams: NavParams,public http: Http) {
  }

  ionViewDidLoad() {
    this.map = this.loadMap();
  }

  loadMap(){

    var directionsService = new google.maps.DirectionsService();
    var directionsRenderer = new google.maps.DirectionsRenderer();

    var map = new google.maps.Map(this.mapElement.nativeElement,{
      zoom: 14,
      center: {lat: -36.637123, lng: -72.951153},
      disableDefaultUI: false,
      mapTypeControl: false,
      scaleControl: true,
      fullscreenControl: false,
      zoomControl: false,
      streeViewControl: true,

    });

    // this.http.get('http://equilibratechile.com/app-nucleo/infraestructura.php', function(responsedata) {
    //      this.each( responsedata.puntos, function(i, value) {
    //           if(value.lat!="" && value.lng!="" )
    //           {
    //                var marker = new google.maps.Marker({
    //                    position: {lat: parseFloat(value.lat), lng: parseFloat(value.lng)},
    //                    animation: google.maps.Animation.DROP,
    //                    title: value.DisplayName+','+ value.ChaserLocation,
    //                    icon:  "iconos/warning.png",
    //                    map: map
    //                  });
    //
    //                  marker.addListener('click', function() {
    //
    //                    var infowindow = new google.maps.InfoWindow({
    //                      content: '<div id="content">'+
    //                                 '<div id="siteNotice">'+
    //                                 '</div>'+
    //                                 '<h5 id="firstHeading" class="firstHeading">'+value.texto+'</h5>'+
    //                                 '<div id="bodyContent">'+
    //
    //                                 '</div>'+
    //                               '</div>'
    //                    });
    //                    infowindow.open(map, marker);
    //                  });
    //          }
    //       });
    //    });

    return map;
  }



}
