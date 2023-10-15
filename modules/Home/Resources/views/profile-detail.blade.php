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
            <div class="about-div">
                <div class="about-title">Gender</div>
                <div class="about-content">
                    <div class="about-button">
                        <button class="subcategory-button">Male</button>
                        <button class="subcategory-button">Female</button>
                        <button class="subcategory-button">Other</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-sm-12">
            <div class="about-div">
                <div class="about-title">Profession</div>
                <div class="about-content">
                    <div class="about-button">
                        <button class="subcategory-button">Student</button>
                        <button class="subcategory-button">Employed</button>
                        <button class="subcategory-button">Unemployed</button>
                        <button class="subcategory-button">Retired</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-7 col-sm-12" style="margin-top:20px">
            <div class="about-div">
                <div class="about-title">Income</div>
                <div class="about-content">
                    <div class="about-button">
                        <button class="subcategory-button">Up to £29k</button>
                        <button class="subcategory-button">£20k - £45k</button>
                        <button class="subcategory-button">£45k - £60k</button>
                        <button class="subcategory-button">More than £60k</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-5 col-sm-12" style="margin-top:20px">
            <div class="about-div">
                <div class="about-title">Have you used Adblocker before?</div>
                <div class="about-content">
                    <div class="about-button">
                        <button class="subcategory-button">Yes</button>
                        <button class="subcategory-button">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container container-box">

    <div class="row">

        <div class="title col-md-12 ">Prefrences</div>

        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="category">
                <div class="category-image">
                    <div class="image-container"
                        style="background-image:url('https://media.istockphoto.com/id/1322277517/photo/wild-grass-in-the-mountains-at-sunset.jpg?s=612x612&w=0&k=20&c=6mItwwFFGqKNKEAzv0mv6TaxhLN3zSE43bWmFN--J5w=')">
                        <h4 class="category-text">Fashion</h4>
                    </div>
                    <div class="subcategory-content">
                        <button class="subcategory-button">Subcategory1</button>
                        <button class="subcategory-button">Subcategory2</button>
                        <button class="subcategory-button">Subcategory</button>
                        <button class="subcategory-button">Subcategory</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="category">
                <div class="category-image">
                    <div class="image-container"
                        style="background-image:url('https://media.istockphoto.com/id/1322277517/photo/wild-grass-in-the-mountains-at-sunset.jpg?s=612x612&w=0&k=20&c=6mItwwFFGqKNKEAzv0mv6TaxhLN3zSE43bWmFN--J5w=')">
                        <h4 class="category-text">Fashion</h4>
                    </div>
                    <div class="subcategory-content">
                        <button class="subcategory-button">Subcategory1</button>
                        <button class="subcategory-button">Subcategory2</button>
                        <button class="subcategory-button">Subcategory</button>
                        <button class="subcategory-button">Subcategory</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="category">
                <div class="category-image">
                    <div class="image-container"
                        style="background-image:url('https://media.istockphoto.com/id/1322277517/photo/wild-grass-in-the-mountains-at-sunset.jpg?s=612x612&w=0&k=20&c=6mItwwFFGqKNKEAzv0mv6TaxhLN3zSE43bWmFN--J5w=')">
                        <h4 class="category-text">Fashion</h4>
                    </div>
                    <div class="subcategory-content">
                        <button class="subcategory-button">Subcategory1</button>
                        <button class="subcategory-button">Subcategory2</button>
                        <button class="subcategory-button">Subcategory</button>
                        <button class="subcategory-button">Subcategory</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="category">
                <div class="category-image">
                    <div class="image-container"
                        style="background-image:url('https://media.istockphoto.com/id/1322277517/photo/wild-grass-in-the-mountains-at-sunset.jpg?s=612x612&w=0&k=20&c=6mItwwFFGqKNKEAzv0mv6TaxhLN3zSE43bWmFN--J5w=')">
                        <h4 class="category-text">Fashion</h4>
                    </div>
                    <div class="subcategory-content">
                        <button class="subcategory-button">Subcategory1</button>
                        <button class="subcategory-button">Subcategory2</button>
                        <button class="subcategory-button">Subcategory3</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="category">
                <div class="category-image">
                    <div class="image-container"
                        style="background-image:url('https://media.istockphoto.com/id/1322277517/photo/wild-grass-in-the-mountains-at-sunset.jpg?s=612x612&w=0&k=20&c=6mItwwFFGqKNKEAzv0mv6TaxhLN3zSE43bWmFN--J5w=')">
                        <h4 class="category-text">Fashion</h4>
                    </div>
                    <div class="subcategory-content">
                        <button class="subcategory-button">Subcategory 1</button>
                        <button class="subcategory-button">Subcategory 2</button>
                        <button class="subcategory-button">Subcategory 3</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="category">
                <div class="category-image">
                    <div class="image-container"
                        style="background-image:url('https://media.istockphoto.com/id/1322277517/photo/wild-grass-in-the-mountains-at-sunset.jpg?s=612x612&w=0&k=20&c=6mItwwFFGqKNKEAzv0mv6TaxhLN3zSE43bWmFN--J5w=')">
                        <h4 class="category-text">Fashion</h4>
                    </div>
                    <div class="subcategory-content">
                        <button class="subcategory-button">Subcategory 1</button>
                        <button class="subcategory-button">Subcategory 2</button>
                        <button class="subcategory-button">Subcategory 3</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container container-box" style="padding-bottom:30px">

    <div class="row">
        <div class="title col-md-12 ">Don't show me ads for</div>
        <div class="col-md-4"><button class="subcategory-button" style="width:100%;">Alcohol</button></div>
        <div class="col-md-4"><button class="subcategory-button" style="width:100%;">Gambling</button></div>
        <div class="col-md-4"><button class="subcategory-button" style="width:100%;">Smoking</button></div>
        
            
    </div>
</div>


    <script>
        const subcategoryButtons = document.querySelectorAll(".subcategory-button");

        subcategoryButtons.forEach(button => {
            button.addEventListener("click", () => {
                subcategoryButtons.forEach(btn => btn.classList.remove("selected"));
                button.classList.add("selected");
            });
        });

    </script>
    @endsection
