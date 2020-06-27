import {InMemoryDbService} from 'angular-in-memory-web-api';

export class TestData implements InMemoryDbService{
    createDb()
    {
        let bookdetails=[

            {id:100,name:"aishwaiya",category:"angular"},
            {id:101,name:"aishwaiya",category:"angular"},

            {id:102,name:"aishwaiya",category:"angular"},

            {id:103,name:"aishwaiya",category:"angular"}

        ];
        return {books:bookdetails};
    }
}