@extends('back.layouts.master')
@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <strong>Normal</strong> Form
        </div>
        <div class="card-body card-block">
            
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Add Category</label>
                    <input type="text" id="category" name="nf-email" placeholder="Enter Category.." class="form-control">
              
                </div>
               
            
        </div>
        <div class="card-footer">
            <button type="submit" id="add" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
           
        </div>
    </div>
</div>
<div class="col-md-6">
    <!-- TOP CAMPAIGN-->
    <div class="top-campaign">
        <h3 class="title-3 m-b-30">Categories</h3>
        <div class="table-responsive">
            <table class="table table-top-campaign">
                <tbody>
                    @foreach ($categories as $category)
                        
          
                    <tr>
                    <td>{{$category->category}}</td>
                    <td id="{{$category->id}}">
                            <button class="btn btn-primary edit">Edit</button>
                            <button class="btn btn-danger delete">Delete</button>
                        </td>
                      
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--  END TOP CAMPAIGN-->
</div>

<div id="token">
    @csrf
</div>

<script>
const csrf = document.querySelector("#token > input[type=hidden]").value;
    let add = document.getElementById('add');
    add.addEventListener('click',(e) => {
        e.preventDefault();
        const category = document.getElementById('category').value;
     
        const url = "{{route('admin.category.store')}}";
       
        
        const data = new FormData;
        data.append('category',category)
        fetch(url,{headers : {
            "X-CSRF-TOKEN" : csrf
        },
            method:"POST",
            body:data
        }).then((res) => res.json())
        .then((res) =>{
            if (res.success) {
                appendData(category)
            }
            else{
                alert('Something went wrong')
                
            }
            
        }).catch((error) => {
            console.log(error);
            
        }) 
        
        
    })


    const appendData = (category) => {
        let firstTr = document.getElementsByTagName('tbody')[0]; 
        
        firstTr.insertAdjacentHTML('afterbegin',`<tr><td>${category}</td>
                        <td>
                            <button type="submit" class="btn btn-primary edit">Edit</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </td></tr>`)
             editData()           
    }
 


const editData = () => {
let edit = document.querySelectorAll('.edit');
for (let i = 0; i < edit.length; i++) {
    edit[i].addEventListener('click',(e) => {
        e.preventDefault();
        let getCategoryName = edit[i].parentElement.parentElement.firstElementChild.innerText;
        let getId = edit[i].parentElement.getAttribute('id');
       
        
        
        let get = edit[i].parentElement.parentElement.innerHTML = 
        `
        <input type="text" name="nf-email" placeholder="${getCategoryName}" class="form-control">
                        <td id="${getId}">
                            <button type="submit" id="${i}" class="btn btn-primary ">Confirm</button>
                            <button type="submit" class="btn btn-danger ${i}">Cancel</button>
                        </td>
        `
        ;


        let getCancel = document.getElementsByClassName(`${i}`)[0];
        
        getCancel.addEventListener('click',(e) => {
            e.preventDefault();
            
            let getParent = getCancel.parentElement.parentElement.innerHTML = 
            `
        <tr><td>${getCategoryName}</td>
            <td id="${getId}">
                            <button class="btn btn-primary edit">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                      </tr>
        `
        ;
          
            
           editData()
        
        })

        let getConfirmed = document.getElementById(`${i}`);

        getConfirmed.addEventListener('click',(e) => {
            e.preventDefault();
            let getNewValue = getConfirmed.parentElement.parentElement.children[0].value;
            let updatedData = new FormData;
            
            
            
            updatedData.append('category',getNewValue);
            updatedData.append('id',getId)
            let updateUrl = "{{route('admin.fetch')}}";

            fetch(updateUrl,{
                headers:{
                    "X-CSRF-TOKEN":csrf
                },
                method:"POST",
                body:updatedData
            }).then((res) => res.json())
            .then((res) => {
                console.log(res);
                
            }).catch((error) => {
                console.log(error);
                
            })
          
            
            getParent = getCancel.parentElement.parentElement.innerHTML = 
            `
        <tr ><td >${getNewValue}</td>
            <td id="${getId}"> 
                            <button class="btn btn-primary edit">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                      </tr>
        `
        ;
          editData()            
        })
        
        
        
        
        
    })

}

}

editData()

const deleteCategory = () => {
    let delButton = document.querySelectorAll('.delete');
    for (let i = 0; i < delButton.length; i++) {
        delButton[i].addEventListener('click',(e) => {
            e.preventDefault();
            let getId = delButton[i].parentElement.getAttribute('id');
            let data = new FormData;
            let delUrl = "{{route('admin.fetchDelete')}}";
            data.append('id',getId);
            fetch(delUrl,{
                headers:{
                    "X-CSRF-TOKEN":csrf
                },
                method:"POST",
                body:data

            }).then((res) => res.json())
            .then((res) => {
                console.log(res);
                
            })
            .catch((error) => {
                console.log(error);
                
            })
            let getElement = delButton[i].parentElement.parentElement.remove();
        });
        
    }
}

deleteCategory();


</script>

@endsection

