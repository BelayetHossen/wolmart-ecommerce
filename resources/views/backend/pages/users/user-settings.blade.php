@extends('backend.layouts.app')




@section('main-content')








            {{-- Auth User photo show --}}
            @php
                $img_name = Auth::guard('siteuser')->user()->photo;
                if (Auth::guard('siteuser')->user()->photo == ''){

                    if (Auth::guard('siteuser')->user()->gender == 'Male') {
                        $img = asset('storage/gender_photo/male.jpg');
                    } else {
                        $img = asset('storage/gender_photo/female.jpg');
                    }

                } else{
                $img = asset('storage/users/').$img_name;
                }
            @endphp


<div class="row p-3">
    <div class="col-12">
       <div class="main-title mb_30">
          <h3 class="m-0">Welcome Back, {{ Auth::guard('siteuser')->user()->name }}</h3>
       </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 box-col-6">
        <div class="card custom-card">
           <div class="card-header"><img class="img-fluid" src="{{ asset('') }}backend/img/profilebox/1.jpg" alt="" data-original-title="" title=""></div>
           <div class="card-profile"><img class="rounded-circle" src="{{ $img }}" alt="" data-original-title="" title=""></div>
           <ul class="card-social">
              <li><a href="#" data-original-title="" title=""><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#" data-original-title="" title=""><i class="fab fa-google-plus-g"></i></a></li>
              <li><a href="#" data-original-title="" title=""><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" data-original-title="" title=""><i class="fab fa-instagram"></i></a></li>
              <li><a href="#" data-original-title="" title=""><i class="fas fa-rss"></i></a></li>
           </ul>
           <div class="text-center profile-details">
              <h4>{{ Auth::guard('siteuser')->user()->name }}</h4>
              <h6>{{ Auth::guard('siteuser')->user()->role->name }}</h6>
           </div>
           <div class="card-footer row">
              <div class="col-4 col-sm-4">
                 <h6>Follower</h6>
                 <h3 class="counter">9564</h3>
              </div>
              <div class="col-4 col-sm-4">
                 <h6>Following</h6>
                 <h3><span class="counter">49</span>K</h3>
              </div>
              <div class="col-4 col-sm-4">
                 <h6>Total Post</h6>
                 <h3><span class="counter">96</span>M</h3>
              </div>
           </div>
        </div>
     </div>


    <div class="col-lg-6 ">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <br><br>
                        <form class="form-horizontal">
                            <label for="First_name">First name</label>
                            <input type="text" class="form-control" id="First_name" placeholder="John" value="John">
                            <label for="Last_name">Last name</label>
                            <input type="email" class="form-control" id="Last_name" placeholder="Doe" value="Doe">
                        </form>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">Describe yourself in 5 words</h3>
                        <br><br>
                        <form class="form-horizontal">
                            <input type="text" class="form-control" id="keywords" placeholder="Like #movies #kittens #travel #teacher #newyork">
                        </form>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">Your photo</h3>
                        <br><br>
                        <div align="center">
                            <div class="col-lg-12 col-md-12">
                                <img class="img-thumbnail img-responsive" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="300px" height="300px">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload a new profile photo!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">My extended profile</h3>
                        <br><br>
                        <p>Visibility of your extended profile:</p>
                        ...
                        <br><br>
                        <form class="form-horizontal">
                            <label>Your bio</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </form>
                        <br><br>
                        <form class="form-horizontal">
                            <label for="Your_location">Your location</label>
                            <input type="text" class="form-control" id="Your_location" placeholder="Fill me out">
                            <br>
                            <label for="Your_gender">Your gender</label>
                            <input type="text" class="form-control" id="Your_gender" placeholder="Fill me out">
                            <br>
                            <label>Your Birthday</label>
                            <div class="form-inline" id="birth-date">
                                <select id="profile_date_year" name="profile[date][year]" class="form-control">
                                    <option value="" selected="selected">Year</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                    <option value="1920">1920</option>
                                    <option value="1919">1919</option>
                                    <option value="1918">1918</option>
                                    <option value="1917">1917</option>
                                    <option value="1916">1916</option>
                                    <option value="1915">1915</option>
                                    <option value="1914">1914</option>
                                    <option value="1913">1913</option>
                                    <option value="1912">1912</option>
                                    <option value="1911">1911</option>
                                    <option value="1910">1910</option>
                                    <option value="1909">1909</option>
                                    <option value="1908">1908</option>
                                    <option value="1907">1907</option>
                                    <option value="1906">1906</option>
                                    <option value="1905">1905</option>
                                    <option value="1904">1904</option>
                                    <option value="1903">1903</option>
                                    <option value="1902">1902</option>
                                    <option value="1901">1901</option>
                                    <option value="1900">1900</option>
                                    <option value="1899">1899</option>
                                    <option value="1898">1898</option>
                                    <option value="1897">1897</option>
                                    <option value="1896">1896</option>
                                    <option value="1895">1895</option>
                                    <option value="1894">1894</option>
                                    <option value="1893">1893</option>
                                    <option value="1892">1892</option>
                                    <option value="1891">1891</option>
                                </select>
                                <select id="profile_date_month" name="profile[date][month]" class="form-control">
                                    <option value="" selected="selected">Month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select id="profile_date_day" name="profile[date][day]" class="form-control">
                                    <option value="" selected="selected">Day</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">Profile settings</h3>
                        <br><br>
                        <h4>Search</h4>
                        <div class="well checkbox">
                            <label class="checkbox-inline" for="profile_searchable"><input type="checkbox" name="profile[searchable]" id="profile_searchable" value="true" checked="checked">
                                Allow for people to search for you within diaspora*
                            </label>
                        </div>
                        <br>
                        <h4>NSFW</h4>
                        <p>NSFW (???not safe for work???) is diaspora*???s self-governing community standard for content which may not be suitable to view while at work. If you plan to share such material frequently, please check this option so that everything you share will be hidden from people???s streams unless they choose to view them.</p>
                        <div class="well checkbox">
                            <label class="checkbox-inline" for="profile_nsfw"><input type="checkbox" name="profile[nsfw]" id="profile_nsfw" value="true">
                                Mark everything I share as NSFW
                            </label>
                        </div>
                        <p class="text-danger"><strong><i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i> If you choose not to select this option, please add the #nsfw tag each time you share such material.</strong></p>
                        <button class="btn btn-default"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</button>
                        <button class="btn btn-primary"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Update Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <div class="col-lg-6">
       <div class="white_card card_height_100 mb_30">
          <div class="white_card_header">
             <div class="white_box_tittle">
                <h4>Withdraw</h4>
             </div>
          </div>
          <div class="white_card_body">
             <div class="row">
                <div class="col-lg-12">
                   <label class="form-label">Amount</label>
                   <div class="common_input mb_20">
                      <input type="text" placeholder="$500">
                   </div>
                </div>
                <div class="col-lg-12">
                   <label class="form-label">Bank</label>
                   <select class="nice_Select2 nice_Select_line wide mb_20" style="display: none;">
                      <option value="1">bank 0001</option>
                      <option value="1">bank 0001</option>
                      <option value="1">bank 0001</option>
                      <option value="1">bank 0001</option>
                   </select>
                   <div class="nice-select nice_Select2 nice_Select_line wide mb_20" tabindex="0">
                      <span class="current">bank 0001</span>
                      <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                      <ul class="list">
                         <li data-value="1" class="option selected">bank 0001</li>
                         <li data-value="1" class="option">bank 0001</li>
                         <li data-value="1" class="option">bank 0001</li>
                         <li data-value="1" class="option">bank 0001</li>
                      </ul>
                   </div>
                </div>
                <div class="col-12">
                   <div class="create_report_btn mt_30">
                      <a href="#" class="btn_1 w-100">SEND</a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="col-lg-12">
       <div class="white_card mb_30 card_height_100">
          <div class="white_card_header pb-0">
             <div class="box_header m-0">
                <div class="main-title">
                   <h3 class="m-0">All Activities</h3>
                </div>
             </div>
          </div>
          <div class="white_card_body pt-0">
             <div class="QA_section">
                <div class="QA_table mb-0 transaction-table">
                   <div class="table-responsive">
                      <table class="table  ">
                         <tbody>
                            <tr>
                               <td scope="row">
                                  <span class="sold-thumb"><i class="ti-arrow-up"></i></span>
                               </td>
                               <td>
                                  <span class="badge bg-danger">Sold</span>
                               </td>
                               <td> <img class="small_img" src="img/currency/1.svg" alt=""> Bitcoin </td>
                               <td>Using - Bank......4585 </td>
                               <td>-0.000234 BTC</td>
                               <td>-0.454 USD</td>
                            </tr>
                            <tr>
                               <td scope="row">
                                  <span class="buy-thumb"><i class="ti-arrow-down"></i></span>
                               </td>
                               <td>
                                  <span class="badge bg-success">Buy</span>
                               </td>
                               <td> <img class="small_img" src="img/currency/2.svg" alt=""> Bitcoin </td>
                               <td>Using - Bank......4585 </td>
                               <td>-0.000234 BTC</td>
                               <td>-0.454 USD</td>
                            </tr>
                            <tr>
                               <td scope="row">
                                  <span class="sold-thumb"><i class="ti-arrow-up"></i></span>
                               </td>
                               <td>
                                  <span class="badge bg-danger">Sold</span>
                               </td>
                               <td> <img class="small_img" src="img/currency/4.svg" alt=""> Bitcoin </td>
                               <td>Using - Bank......4585 </td>
                               <td>-0.000234 BTC</td>
                               <td>-0.454 USD</td>
                            </tr>
                            <tr>
                               <td scope="row">
                                  <span class="sold-thumb"><i class="ti-arrow-up"></i></span>
                               </td>
                               <td>
                                  <span class="badge bg-danger">Sold</span>
                               </td>
                               <td> <img class="small_img" src="img/currency/3.svg" alt=""> Bitcoin </td>
                               <td>Using - Bank......4585 </td>
                               <td>-0.000234 BTC</td>
                               <td>-0.454 USD</td>
                            </tr>
                            <tr>
                               <td scope="row">
                                  <span class="sold-thumb"><i class="ti-arrow-up"></i></span>
                               </td>
                               <td>
                                  <span class="badge bg-danger">Sold</span>
                               </td>
                               <td> <img class="small_img" src="img/currency/1.svg" alt=""> Bitcoin </td>
                               <td>Using - Bank ......4585 </td>
                               <td>-0.000234 BTC</td>
                               <td>-0.454 USD</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
