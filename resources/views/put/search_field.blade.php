  {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label">Search From </label><i class="bar"></i>
            <input type="date" class="form-control" name="from_date" required/>
        </div>
        <div class="form-group">
            <label class="control-label">Search To</label><i class="bar"></i>
            <input type="date" class="form-control" name="to_date" required/>
        </div>
      
    <div class="m-t-20 text-center">
         <button class="btn btn-success btn-small" type="submit"><span>Submit</span> </button>
    </div>