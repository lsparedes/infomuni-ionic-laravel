import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule, IonicPageModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';
import { HttpModule } from '@angular/http';
import { HttpClientModule } from '@angular/common/http';
import { AuthProvider } from '../providers/auth/auth';
import { IonicStorageModule } from '@ionic/storage';
import { Camera } from '@ionic-native/camera/ngx';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { ListPage } from '../pages/list/list';
import { SlidesPage } from '../pages/slides/slides';
import { AuthPage } from '../pages/auth/auth';
//import { PrincipalPage } from '../pages/principal/principal';
import { InfomapaPage } from '../pages/infomapa/infomapa';
import { ParticipacionPage } from '../pages/participacion/participacion';
import { EvidenciaPage } from '../pages/evidencia/evidencia';
import { EmprendePage } from '../pages/emprende/emprende';
import { DetalleseventosPage } from '../pages/detalleseventos/detalleseventos';
import { DetallesemprendePage } from '../pages/detallesemprende/detallesemprende';
import { DetalleshomePage } from '../pages/detalleshome/detalleshome';
import { DenunciaPage } from '../pages/denuncia/denuncia';
import { PreguntasPage } from '../pages/preguntas/preguntas';


import { UserProvider } from '../providers/user/user';

@NgModule({
  declarations: [
    MyApp,
    HomePage,
    ListPage,
    SlidesPage,
    AuthPage,
    InfomapaPage,
    ParticipacionPage,
    EmprendePage,
    DetalleseventosPage,
    DetallesemprendePage,
    DetalleshomePage,
    DenunciaPage,
    PreguntasPage,
    
    EvidenciaPage

  ],
  imports: [
    BrowserModule,
    HttpModule,
    HttpClientModule,
    IonicPageModule.forChild(ListPage),
    IonicStorageModule.forRoot(),
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    ListPage,
    SlidesPage,
    AuthPage,
    InfomapaPage,
    ParticipacionPage,
    EmprendePage,
    DetalleseventosPage,
    DetallesemprendePage,
    DetalleshomePage,
    DenunciaPage,
    PreguntasPage,

    EvidenciaPage

  ],
  providers: [
    StatusBar,
    SplashScreen,
    Camera,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    AuthProvider,
    UserProvider
  ]
})
export class AppModule {}
