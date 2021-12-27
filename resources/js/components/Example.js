import React from 'react';
import ReactDOM from 'react-dom';
 
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom';

//Importar páginas
import index from './Paginas/Index';
import Contacto from './Paginas/Contacto';
import Error404 from './Paginas/Error404';
import Direcciones from './Paginas/Direcciones';
import Carreras from './Paginas/Carreras/Carreras';

/*Importamos componentes personalizados*/
import Menu from './Menu/Menu';
import Notificacion from './Notificacion/Notificacion';
import Direccion from './Formularios/Direccion';
import validacion from './Formularios/validacion';
import Index from './Paginas/Index';

function Example() {
    return (
        <Router>
        <Menu />
        <div className="container">
        <Switch>
            <Route path="/" exact={true}>
              <Index />
            </Route>
            <Route path="/contacto" exact={true}>
              <Contacto />
            </Route>
            <Route path="/Direcciones" exact={true}>
              <Direcciones />
            </Route>
            <Route path="/Carreras" exact={true}>
              <Carreras />
            </Route>
            <Route path="*" exact={true}>
              <Error404 />
            </Route>
        </Switch>                 
        </div>
        </Router>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
