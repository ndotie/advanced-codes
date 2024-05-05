//backend loooks like this
<?php
 public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Blog::where('title', 'like', '%' . $query . '%')->get();

        return response()->json($results); //He returns just old json
    }

//web.php looks like this
//...
Route::get('/search', [BlogController::class, 'search'])->name('search');


//now lets check the js on blade.php

1. Search field
  <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
            <button class="btn btn-outline-secondary" type="button" id="basic-addon2">Search</button>
        </div>
2. Where we put results
   <div id="searchResults"></div> //empty as fuck at first
3. Search script
  <script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var query = this.value;
        if (query.length >= 3) {
            $.ajax({
                url: "{{ route('search') }}",
                type: "GET",
                data: {
                    query: query
                },
                success: function(response) {

                    // Handle the response and update the search results
                    var resultsDiv = document.getElementById('searchResults');
                    // Example: Render search results as a list
                    resultsDiv.innerHTML = '';
                    response.forEach(function(result) {
                        resultsDiv.innerHTML += `
                        <div class="job-item p-4 mb-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                <!-- <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;"> -->
                <div class="text-start ps-4">
                    <h5 class="mb-3">${result.title}
                    </h5>
                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>Dar es salaam, TZ</span>
                    <!-- <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span> -->
                    <!-- <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span> -->
                </div>
            </div>
            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                <div class="d-flex mb-3">
                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                    <a class="btn btn-primary" href="blogs/${result.id}">Read</a>
                </div>
                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>
                        ${new Date(result.created_at).toLocaleString('default', { year: 'numeric', month: 'long', day: 'numeric' })}
                    </small>
            </div>
        </div>
    </div>
                        `; // Adjust as per your model structure
                    });
                }
            });
        }
    });
</script>

  SINCE WE DONT HAVE CARBON ON JS WE USE JS TO THE MAXIMUM TO FORMAT DATE
  ${new Date(result.created_at).toLocaleString('default', { year: 'numeric', month: 'long', day: 'numeric' })}

