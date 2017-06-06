<nav-search q="{{$q}}" sort_by="{{$sort_by}}" display="{{$display}}" feed="{{$feed}}" inline-template>
    <div v-if="visible" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            Results: productCount
            </div>
            <div class="col-sm-3 col-md-3 navbar-left">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input v-model="q" type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sort:
                        @{{ sortNavText }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a @click="sortByPrice()" href="#">Price</a></li>
                        <li><a @click="sortByPopularity()" href="#">Popularity</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Display:
                        @{{ displayNavText }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a @click="displayList()" href="#">List</a></li>
                        <li><a @click="displayGrid()" href="#">Grid</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Feed:
                        @{{ feedNavText }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a @click="queryAllSources()" href="#">All</a></li>
                        <li><a @click="queryAmazonSource()" href="#">Amazon</a></li>
                        <li><a @click="queryEbaySource()" href="#">Ebay</a></li>
                        <li><a @click="queryEtsySource()" href="#">Etsy</a></li>
                    </ul>
                </li>
                <li v-if="userSearch"  id="usersearch" @click="clearUserSearch()" onclick="clearUserSearch();">
                <a href="#"><span><i class="fa fa-times-circle text-danger"></i></span>User: @{{ userSearch.username }}
                </a>
                </li>

            </ul>
        </div>
    </div>
</nav-search>