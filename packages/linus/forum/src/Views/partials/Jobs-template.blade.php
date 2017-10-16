
    <div>
        <input type="text" placeholder="Enter Topic Title" class="form-control" name="title">
        @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
    </div>


    <div class="row">
        <div class="col-lg-6 col-md-6">
            <select name="category_id" id="category" class="form-control" required>

                <option value="{{$id}}" selected>{{$name}}</option>

            </select>
        </div>
        <div class="col-lg-6 col-md-6">
            <select name="subcategory" id="subcategory" class="form-control">
                <option value="" disabled="" selected="">请选择发帖类别</option>
                <option value="op1">一般发帖/General</option>
                <option value="op2">紧急发帖/Urgent</option>
            </select>
        </div>
    </div>
