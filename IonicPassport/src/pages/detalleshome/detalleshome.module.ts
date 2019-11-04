import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { DetalleshomePage } from './detalleshome';

@NgModule({
  declarations: [
    DetalleshomePage,
  ],
  imports: [
    IonicPageModule.forChild(DetalleshomePage),
  ],
})
export class DetalleshomePageModule {}
