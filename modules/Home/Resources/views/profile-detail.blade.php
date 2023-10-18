@extends('layouts.app2')

@section('content')

<style>
    .category {
        text-align: justify;
        margin: 20px 0px;
    }

    .container-box {
        background-color: whitesmoke;
        border-radius: 5px;
        padding: 10px 40px;
        margin: 30px auto;
        /* padding: 10px;
        margin: 20px 0px; */
    }

    .category-image .image-container {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 5px;
        position: relative;
    }

    .subcategory-button {
        padding: 5px 10px;
        margin: 5px;
        font-size: 12px;
        color: #000099;
        border: 1px solid #ced4da;
        background-color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .subcategory-button.selected {
        background-color: #0056b3;
        color: white;
    }

    .category-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 22px;
        color: #000099;
        font-weight: 600;
    }

    .title {
        font-size: 22px;
        color: #000099;
        font-weight: 600;
        margin: 20px auto;
    }

    .subcategory-content {
        display: inline-table;
    }

    .about-div {
        padding: 10px;
        border: 1px solid #000099;
        border-radius: 5px;
        height: 100px;
    }

    .about-title {
        font-size: 14px;
        color: #000099;
        font-weight: 500;
        margin-left: 20px;
    }

    .about-content {
        display: flex;
        width: 100%;
    }

    .about-button {
        padding: 12px;
    }

    button {
        border
    }

</style>

<form method="post" action="{{route('user.profile-detail-store')}}">
    @csrf
    <div class="container container-box" style="padding-bottom:30px">

        <div class="row">
            <div class="title col-md-12 ">About You</div>
            <div class="col-md-6 col-lg-3 col-sm-6 ">
                <div class="about-div">
                    <div class="about-title">Date of Birth</div>
                    <div class="about-content">
                        <input type="date" class="form-control" name="dob">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6">
                <input type="hidden" name="gender" id="gender">
                <div class="about-div">
                    <div class="about-title">Gender</div>
                    <div class="about-content">
                        <div class="about-button">
                            <button type="button" class="subcategory-button gender" value="male">Male</button>
                            <button type="button" class="subcategory-button gender" value="female">Female</button>
                            <button type="button" class="subcategory-button gender" value="other">Other</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-sm-12">
            <input type="hidden" name="profession" id="profession">
                <div class="about-div">
                    <div class="about-title">Profession</div>
                    <div class="about-content">
                        <div class="about-button">
                            <button type="button"  class="subcategory-button profession" value="student">Student</button>
                            <button type="button" class="subcategory-button profession" value="employed">Employed</button>
                            <button type="button" class="subcategory-button profession" value="unemployed">Unemployed</button>
                            <button type="button" class="subcategory-button profession" value="retired">Retired</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-7 col-sm-12" style="margin-top:20px">
            <input type="hidden" name="income" id="income">
                <div class="about-div">
                    <div class="about-title">Income</div>
                    <div class="about-content">
                        <div class="about-button">
                            <button type="button" class="subcategory-button income" value="0-20">Up to £20k</button>
                            <button type="button" class="subcategory-button income" value="20-45">£20k - £45k</button>
                            <button type="button" class="subcategory-button income" value="45-60">£45k - £60k</button>
                            <button type="button" class="subcategory-button income" value="60-infinite">More than £60k</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-5 col-sm-12" style="margin-top:20px">
            <input type="hidden" name="add_before" id="add_before">
                <div class="about-div">
                    <div class="about-title">Have you used Adblocker before?</div>
                    <div class="about-content">
                        <div class="about-button">
                            <button type="button" class="subcategory-button add_before" value="1">Yes</button>
                            <button type="button" class="subcategory-button add_before" value="0">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-box">

        <div class="row">

            <div class="title col-md-12 ">Prefrences</div>
            <input type="hidden" name="interest" id="interest">

            @isset($interests)
                @foreach($interests as $interest)
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="category">
                        <div class="category-image">
                            <div class="image-container"
                                style="background-image:url('{{asset("$interest->image")}}')">
                                <h4 class="category-text">{{$interest->name??''}}</h4>
                            </div>
                            <div class="subcategory-content">
                                @if(isset($interest->childs) && count($interest->childs)>0)
                                    @foreach($interest->childs as $child)
                                        <button type="button" value="{{$child->id}}" class="subcategory-button child">{{$child->name??''}}</button>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endisset
        </div>
    </div>

    <div class="container  container-box " style="padding-bottom:30px">
    <input type="hidden" name="add_not_show" id="add_not_show">
        <div class="row">
            <div class="title col-md-12 ">Don't show me ads for</div>
            <div class="col-md-4"><button type="button" class="subcategory-button add_not_show" style="width:100%;" value="alcohol">Alcohol</button></div>
            <div class="col-md-4"><button type="button" class="subcategory-button add_not_show" style="width:100%;" value="gambling">Gambling</button></div>
            <div class="col-md-4"><button type="button" class="subcategory-button add_not_show" style="width:100%;" value="smoking">Smoking</button></div>
            
                
        </div>
    </div>
    <div class="container" style="margin:20px auto">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <button type="submit" class="btn" style="background-color:#8683FF;float:right">Save</button>
            </div>
        </div>
    </div>
</form>


    <script>
        const subcategoryButtons = document.querySelectorAll(".child");
        const interest = [];
        subcategoryButtons.forEach(button => {
            button.addEventListener("click", () => {
                if (button.classList.contains('selected')) {
                    // Button is selected, remove its value from the interest array
                    const value = button.value; // You may need to use the appropriate property to get the value
                    const index = interest.indexOf(value);
                    if (index !== -1) {
                        interest.splice(index, 1);
                    }
                    button.classList.remove("selected");
                } else {
                    // Button is not selected, add its value to the interest array
                    const value = button.value; // You may need to use the appropriate property to get the value
                    interest.push(value);
                    button.classList.add("selected");
                }
                $('#interest').val(interest);
            });
        });

        const genderButtons = document.querySelectorAll(".gender");
        genderButtons.forEach(button => {
            button.addEventListener("click", () => {
                    genderButtons.forEach(btn => {btn.classList.remove("selected"); $('#gender').val('')});
                    // Button is not selected, add its value to the interest array
                    const value = button.value; // You may need to use the appropriate property to get the value
                    button.classList.add("selected");
                    $('#gender').val(value);
            });
        });

        const professionButtons = document.querySelectorAll(".profession");
        professionButtons.forEach(button => {
            button.addEventListener("click", () => {
                    professionButtons.forEach(btn => {btn.classList.remove("selected"); $('#profession').val('')});
                    // Button is not selected, add its value to the interest array
                    const value = button.value; // You may need to use the appropriate property to get the value
                    button.classList.add("selected");
                    $('#profession').val(value);
            });
        });

        const incomeButtons = document.querySelectorAll(".income");
        incomeButtons.forEach(button => {
            button.addEventListener("click", () => {
                    incomeButtons.forEach(btn => {btn.classList.remove("selected"); $('#income').val('')});
                    // Button is not selected, add its value to the interest array
                    const value = button.value; // You may need to use the appropriate property to get the value
                    button.classList.add("selected");
                    $('#income').val(value);
            });
        });

        const add_beforeButtons = document.querySelectorAll(".add_before");
        add_beforeButtons.forEach(button => {
            button.addEventListener("click", () => {
                    add_beforeButtons.forEach(btn => {btn.classList.remove("selected"); $('#add_before').val('')});
                    // Button is not selected, add its value to the interest array
                    const value = button.value; // You may need to use the appropriate property to get the value
                    button.classList.add("selected");
                    $('#add_before').val(value);
            });
        });

        const add_not_showButtons = document.querySelectorAll(".add_not_show");
        const add_not_show = [];
        add_not_showButtons.forEach(button => {
            button.addEventListener("click", () => {
                if (button.classList.contains('selected')) {
                    // Button is selected, remove its value from the interest array
                    const value = button.value; // You may need to use the appropriate property to get the value
                    const index = add_not_show.indexOf(value);
                    if (index !== -1) {
                        add_not_show.splice(index, 1);
                    }
                    button.classList.remove("selected");
                } else {
                    // Button is not selected, add its value to the interest array
                    const value = button.value; // You may need to use the appropriate property to get the value
                    add_not_show.push(value);
                    button.classList.add("selected");
                }
                $('#add_not_show').val(add_not_show);
            });
        });

    </script>
    @endsection
