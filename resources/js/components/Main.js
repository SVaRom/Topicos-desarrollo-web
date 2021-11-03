import React from "react";
import ReactDOM from "react-dom";
import Navi from "./Nav"
import LoginForm from "./Example";
import Home from "./Home";
import{
    BrowserRouter as Router,
    Switch,
    Route
} from "react-router-dom"
function Main(){
    return(
        <Router>
            <main>
                <Navi/>
                <Switch>
                    <Route path="/topicos/public/Home" exact component={Home}/>
                    <Route path="/topicos/public/LoginForm" exact component={LoginForm}/>
                </Switch>
            </main>
        </Router>
    )
}
export default Main
if (document.getElementById("example")) {
    ReactDOM.render(<Main />, document.getElementById("example"));
}