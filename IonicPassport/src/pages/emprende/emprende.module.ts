import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { EmprendePage } from './emprende';

@NgModule({
  declarations: [
    EmprendePage,
  ],
  imports: [
    IonicPageModule.forChild(EmprendePage),
  ],
})
export class EmprendePageModule {}
