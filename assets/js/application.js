import React, { useEffect, useState } from "react";
import { StrictMode } from "react";
import Header from "./composents/Header";
import Main from "./composents/main/index.jsx";
import { createRoot } from "react-dom/client";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

function Application() {
  return (
    // On utilise la librairie "react-router-dom" pour gérer les routes de notre application et ainsi faire du single page application
    // une route permet d’afficher des composants de manière conditionnelle. Si le chemin de l'url du navigateur correspond au path indiqué dans le path de la <Route> alors le composant indiqué dans l'attribut élément est appelé
    <Router>
      {/* <BanniereHeader />
      <Navbar /> */}
      <Header />
      {/* <Main> */}
      {/* <Routes> */}
      {/* <Route exact path="/" element={<Accueil />} /> */}
      {/* les données des catégories , actualites, les dates pour l'affichage ainsi que les potentielles erreurs recontrées lors du fetch sont transmises au composant ListeActualites en tant que prop qui lui-même se chargera de les transmettre à ses children */}
      {/* </Routes> */}
      {/* </Main> */}
      {/* <Footer /> */}
    </Router>
  );
}

export default Main;

if (document.getElementById("app")) {
  const rootElement = document.getElementById("app");
  const root = createRoot(rootElement);

  // On dit à React d'attacher le composant <Application /> à la div nommée root
  root.render(
    <StrictMode>
      <Application />
    </StrictMode>
  );
}
