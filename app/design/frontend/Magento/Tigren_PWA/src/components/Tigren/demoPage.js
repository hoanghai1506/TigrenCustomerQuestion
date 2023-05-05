import React from "react";
import './style.css'

import {Link, Route, BrowserRouter, Router} from "react-router-dom";


import Index from "./CustomerQuestion/index.component";
import Create from "./CustomerQuestion/create.component";


function MyApp() {


    return (<div>
            <BrowserRouter>
                <button className="custom-btn-2 btn-5"><Link to="/index">Home</Link></button>
                <button className="custom-btn-2 btn-5"><Link to="/create">Create</Link></button>
                <Route path="/index" component={Index}/>
                <Route path="/create" component={Create}/>
            </BrowserRouter>
        </div>
    );
}

export default MyApp;

