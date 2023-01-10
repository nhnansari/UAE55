@extends('theme1.template')
@section('title',$ad->title)
@section('content')
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">
            <div class="section-title">
                <h2>{{$ad->title}}</h2>
                <p>{{$ad->description}}</p>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-12 col-xl-12 card p-3">
                     <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAABKCAMAAABQOdpXAAAAV1BMVEX///+dnZ2FhYWKioqGhobj4+O+vr6CgoLx8fGNjY1+fn6xsbHDw8Pi4uKRkZH8/PzX19fs7OyXl5eenp6mpqbMzMysrKzY2NjJycnu7u66urr29vZ2dnaXVKsQAAAGFUlEQVR4nO2c2XbjKBBAEYuQkNCCNlue///OqQIk407nrZnJaeo+JMYGJXbuKYoChQ1LRRB/mGVgFSOIP05FYhE5ILGILJBYRBZILCILJBaRBRKLyAKJRWSBxCKyQGIRWSCxiCyQWEQWSCwiCyQWkQUSi8gCiUVkgcQiskBiEVkgsYgskFhEFkgsIgskFpGFUsWy1r6ux41VgFXN+KXbs+72s59DQ1nfbX4lHZS1TTpgtDCiiyNGP8Jj5wxv4idTqFiz0bq7Gic0PMOuPrt1WiLaWWxd3XQ1XR1eXOslGTANMELAiAVFau4RWq9539CPo1CxOimEvCJPDQ3OOXwVb9uQlQspWsmFMOgJ992wn95jjx6HvoNRp+GyXPouB4jFsekhsYqgAYeE7GMLxNqnaep30Ign8UdxwR/NOE+VqbHNRTsdx1E7KfTme4wtXueWsQMRh4eabd0KuXix2i0ysbIoUywINA6MiK1ayod/MNb8UgaZuIiRKTwHmoQgd0qxXD2GVugY+qwWcg952lg55sVyed/Iz6VMsSAyzYvg0aFbLDAOTLlTeNDmYwK7xXrBVOd7DYIfnZB1eB1c3e/O+DqJVRgT/sEnLeJbT8RiEH/ulAkiED+TNd8t1ghCoTgWciimtGi9ZU/Q9WOFSGKVhhN8wnCj/WLvQ6xO8vdcOMB0qavaxhiWRiwv1go5mL+aH3Jw8ctnCWINx+SxOd/PT6REsXygYexxzXSpWI9UrLnlmJzrIbx8iwXZPn5qT+5XlocOcWnj4mNNGVaFcVG4sMIoUaxVeJFgSaef2E7F6lOxQBYIR1g78AaCWGqe5wMWfxxXlJ2UJz7vQuibfi9WKGORWH8/Ty2EnZWa91gp+JgK/SyZ0EB2LsJaMWqC3xzMhCMsAie8zil86INA2H7+JJwKY+W9tMJ7iWL54ijOT1jMwrntu+T9YqzCcu8ud8oTM6w+uQ4OaiDz+kylKHkvCawVyEAskiZinTJV4crabcjGwKDHtm1H2PcZh/s6MoS+VYjhquYrfEBilcQDMu86ALELJ693gRSyJ/2eCWc+hAgEsSlErDbZf8aaRbxOzX3omw2YFeLd5pMqEqsgxrvKAFS+UgCLvLXv+3rVMJklJU6c4qqHPXZ95VipWC7JxvYQ+h4a8/zHVsNqEncdcUunjzxYWRQn1qSTKOIrpX4TOs6M+ky62jZkVZCsX6vCt1h3XdT3DAUM9jDC70LHbWq/CR3gpYWu4sRqtUmWfVwbex2bgSVc90vi3g8+WRdhz8Zo/hZr0aZ/d3Ta+CrFvAqNI5z/GemxGRLrL8cqlZzneyrV4BdP85vuaoJsPeqk0qEfDdbcBYXGTtsRH4/qTWn1huLEIv4bSCwiCyQWkQUSi8gCifWVMSbr49e7dsLz8fvvkn0iQmLd4A6z1K9xN6ZVsGB0xjh/+oEtBtq7OXyjM2bATZ1OG40FB8e1dBuzZsfae2lVhW8hsW50VfetHOt/6qMdwCZhbRs8mbVjh4mHt0x/tAJrod28Y0nMufp0ZmMrNNzXHexSIbFu9okp3bHR4t7Mi7kOo1J4qdddK8IEuYBfFoLXgJ8b7k1jv7Fd2Uu0p67/v1//h0Fipaza500jWtPzs9ZXcd1JGev1azuyWj9G4Y/6DUEsNoBhk5Q0Ed6QWAnKhCOgFd6f2umhvW9MraWIqfphxKDl9vIHIk6wzK1KdbjH+BLy/O1li4TESogBy+Hxh6c5MaEK2ftsBn7dCTaftdUbEyjR6jB5N4bj7YSrHLT65srlQWK9mX3AGiuJejxxj/lhQjLueNOZeBZ+xn/28GRL+2INno1xe+P/Tchkuqa4MwzfQ2K9CQGr06IVRrHFLEusHsBKEPJz48PZ9E/lUEBlRCclBLQhTJcvI0bWG5oMIyTWzWv3qfrWAfuTjY917X0tdNwxktndn9Ubt331sUt1qz9lc4YjfNuOxwe7/ZuianGQWEQWSCwiCyQWkQUSi8gCiUVkgcQiskBiEVkgsYgskFhEFkgsIgskFpEFEovIAolFZIHEIrJAYhFZILGILJBYRBZILCILFRuWiiD+MMvwL0GHQPgXp3hHAAAAAElFTkSuQmCC">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-4 col-xl-4 card p-3">
                    <img src="/rendered/{{$ad->picture}}" class="ad_image">
                </div>
                <div class="col-sm-12 col-lg-8 col-xl-8 card p-3">
                    <div class="row">

                    </div>
                     <table class="table">
                         <tr>
                             <td>Price</td><td>{{$ad->price}} AED</td>
                         </tr>
                         <tr>
                             <td>Emirate</td><td>{{$ad->emirates}} </td>
                         </tr>
                         <tr>
                             <td>Ad Date</td><td>{{$ad->created_at}} </td>
                         </tr>
                         <tr>
                             <td>Posted By</td><td>{{$seller->name}} </td>
                         </tr>
                         <tr>
                             <td>Contact</td><td>
                            @auth
                            {{$ad->contact}}
                            @endauth
                            @guest
                                Login to view
                            @endguest
                            </td>
                         </tr>

                     </table>
                     @auth

                     <div class="row">
                        <h4>Bids </h4>
                        @foreach ($ad->bids as $bid )
                            <table class="table">
                                <tr>
                                    <td>Price</td><td>{{$bid->price}} AED</td>
                                </tr>
                            </table>
                        @endforeach
                     </div>
                    <div class="row">
                        <div class="col-sm-3 col-lg-3 col-md-3 col-xl-3">
                            <div class="ad_action_icons">
                                <button class="btn btn-primary" onclick="addFavorite({{$ad->id}})">Add to Favorites <i class="bi bi-heart" title="Add to Favorite"></i></button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6 col-md-6 col-xl-6">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-3 pt-3">
                                    <label>Bid Price: </label>
                                </div>
                                <div class="col-6 col-sm-6 col-lg-6 col-xl-6 col-md-6">
                                    <input type="number" class="form-control" id="bid_price" placeholder="1"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 col-lg-3 col-md-3 col-xl-3">

                            <div class="ad_action_icons">
                                <button class="btn btn-primary" onclick="placeBid({{$ad->id}})">Place Bid <i class="bi bi-hammer" title="Place a bid"></i></button>
                            </div>
                        </div>

                    </div>
                    @endauth
                </div>

            </div>

        </div>
    </section><!-- End Team Section -->

@endsection

