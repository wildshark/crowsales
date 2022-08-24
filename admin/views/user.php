<div class="page-header">
    <div class="page-title">
        <h4>Store List</h4>
        <h6>Manage your Store</h6>
    </div>
    <div class="page-btn">
        <a href="addstore.html" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-2">Add
            Store</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-top">
            <div class="search-set">
                <div class="search-path">
                    <a class="btn btn-filter" id="filter_search">
                        <img src="assets/img/icons/filter.svg" alt="img">
                        <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                    </a>
                </div>
                <div class="search-input">
                    <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                </div>
            </div>
            <div class="wordset">
                <ul>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                src="assets/img/icons/pdf.svg" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                src="assets/img/icons/excel.svg" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                src="assets/img/icons/printer.svg" alt="img"></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card" id="filter_inputs">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" placeholder="Store Name">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" placeholder="Enter Phone">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <select class="select">
                                <option>Disable</option>
                                <option>Enable</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                        <div class="form-group">
                            <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg"
                                    alt="img"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table  datanew">
                <thead>
                    <tr>
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        <th>Store name </th>
                        <th>User name </th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Thomas</td>
                        <td>Thomas21 </td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="582c303735392b183d20393528343d763b3735">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user1" class="check">
                                <label for="user1" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Benjamin</td>
                        <td>504Benjamin </td>
                        <td>123-456-888</td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="05667076716a68607745607d64687569602b666a68">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user2" class="check" checked="">
                                <label for="user2" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>James</td>
                        <td>James 524 </td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="0d676c60687e4d68756c607d6168236e6260">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user3" class="check" checked="">
                                <label for="user3" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Bruklin</td>
                        <td>Bruklin2022</td>
                        <td>123-456-888</td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="2e4c5c5b454247406e4b564f435e424b004d4143">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user4" class="check" checked="">
                                <label for="user4" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Franklin</td>
                        <td>BeverlyWIN25</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="480a2d3e2d3a2431082d30292538242d662b2725">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user5" class="check">
                                <label for="user5" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>B. Huber </td>
                        <td>BeverlyWIN25</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="6f271a0d0a1d2f0a170e021f030a410c0002">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user6" class="check">
                                <label for="user6" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Alwin</td>
                        <td>Alwin243</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="b4d7c1c7c0dbd9d1c6f4d1ccd5d9c4d8d19ad7dbd9">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user7" class="check">
                                <label for="user7" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Fred john</td>
                        <td>FredJ25</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="0f656067614f6a776e627f636a216c6062">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user15" class="check">
                                <label for="user15" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Rasmussen </td>
                        <td>Cras56</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="722013011f070101171c32170a131f021e175c111d1f">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user9" class="check" checked="">
                                <label for="user9" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Grace </td>
                        <td>Grace2022</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="2c4f595f584341495e6c49544d415c4049024f4341">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user10" class="check" checked="">
                                <label for="user10" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Rasmussen </td>
                        <td>Cras56</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="075566746a727474626947627f666a776b622964686a">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user19" class="check" checked="">
                                <label for="user19" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>Grace </td>
                        <td>Grace2022</td>
                        <td>+12163547758 </td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="b1d2c4c2c5dedcd4c3f1d4c9d0dcc1ddd49fd2dedc">[email&#160;protected]</a>
                        </td>
                        <td>
                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="user18" class="check" checked="">
                                <label for="user18" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <a class="me-3" href="editstore.html">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>