import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import { Observable } from 'rxjs';
import {Book} from './book';

@Injectable({
  providedIn: 'root'
})
export class BooksnameService {
  bookurl='/api/books';


  constructor(private httpclient:HttpClient) { }
  getbookdatafromservice():Observable<any>
  {
return this.httpclient.get(this.bookurl);
  }
}
