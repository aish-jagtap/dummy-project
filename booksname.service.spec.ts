import { TestBed } from '@angular/core/testing';

import { BooksnameService } from './booksname.service';

describe('BooksnameService', () => {
  let service: BooksnameService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(BooksnameService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
