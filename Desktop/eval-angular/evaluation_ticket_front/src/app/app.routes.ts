import { Routes } from '@angular/router';
import { ListOfTicketComponent } from './list-of-ticket/list-of-ticket.component';
import { CreateTicketComponent } from './create-ticket/create-ticket.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { LoginComponent } from './login/login.component';
import { NotFoundComponent } from './not-found/not-found.component';

export const routes: Routes = [
    { path: 'list', component: ListOfTicketComponent},
    { path: 'create', component: CreateTicketComponent},
    { path: 'dashboard', component: DashboardComponent},
    { path: 'login', component: LoginComponent},
    { path: '', redirectTo: 'list', pathMatch: 'full' },
    //Not found
    { path: '**', component: NotFoundComponent }
];
