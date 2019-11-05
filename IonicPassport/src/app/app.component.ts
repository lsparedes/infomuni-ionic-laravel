import { Component, ViewChild } from '@angular/core';
import { Nav, Platform, MenuController } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';

import { HomePage } from '../pages/home/home';
import { ListPage } from '../pages/list/list';
import { InfomapaPage } from '../pages/infomapa/infomapa';
import { ParticipacionPage } from '../pages/participacion/participacion';
import { EmprendePage } from '../pages/emprende/emprende';
import { EvidenciaPage } from '../pages/evidencia/evidencia';
//import { PrincipalPage } from '../pages/principal/principal';



import { AuthProvider } from '../providers/auth/auth';

@Component({
  templateUrl: 'app.html'
})
export class MyApp {
  @ViewChild(Nav) nav: Nav;

  rootPage: any = 'PrincipalPage';
  pages: Array<{title: string, component: any, icon: string}>;
  signal_app_id:string = '01dba292-79f5-4d49-bf3d-2b68486e15d0';
  firebase_id:string= '586230391111';
  icons: string[];
  public userDetails : any;
  


  constructor(public platform: Platform, public statusBar: StatusBar, public splashScreen: SplashScreen,
      private menuCtrl: MenuController,
      private authService: AuthProvider
    ) {
    this.initializeApp();

    this.icons = ['home', 'calendar', 'navigate', 'stats', 'person', 'search'];
    // used for an example of ngFor and navigation
    this.pages = [
      { title: 'Inicio', component: HomePage, icon: this.icons[0] },
      { title: 'Eventos', component: ListPage, icon: this.icons[1] },
      { title: 'Infomapa', component: InfomapaPage, icon: this.icons[2]},
      { title: 'Participación', component: ParticipacionPage, icon: this.icons[3]},
      { title: 'Emprende', component: EmprendePage, icon: this.icons[4]},
      { title: 'Evidencia', component: EvidenciaPage, icon: this.icons[5]},
      // { title: 'Slides', component: SlidesPage }

    ];

  }

  initializeApp() {
    this.platform.ready().then(() => {
      //this.menuCtrl.enable(false);
      //this.statusBar.styleDefault();
      this.splashScreen.hide();
      this.splashScreen.hide();
    });
  }

  logout () {
    this.authService.removeCredentials();
    setTimeout(() => {
      this.menuCtrl.enable(false);
      this.nav.setRoot(this.rootPage);
    }, 750)
  }

  openPage(page) {
    // Reset the content nav to have just this page
    // we wouldn't want the back button to show in this scenario
    this.nav.setRoot(page.component);
  }
}
