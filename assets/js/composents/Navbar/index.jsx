import React from "react";
import styles from "./style.module.scss";
import { Link } from "react-router-dom";
export default function Navbar() {
  const gererCliqueDuMenu = () => setClique(!clique);

  const fermetureMenuMobile = () => setClique(false);
  const OuvertureDuBurgeraLappuiDuBoutonEntrer = (e) => {
    if (e.key === "Enter") gererCliqueDuMenu();
  };
  return (
    <>
      <nav className={styles.navbar}>
        <div className={styles.menuIcon} onClick={gererCliqueDuMenu}>
          <i
            tabIndex="0"
            onKeyDown={OuvertureDuBurgeraLappuiDuBoutonEntrer}
            // className={clique ? `fas fa-times` : `fas fa-bars`}
          />
        </div>
        <ul
        // className={
        //   clique ? `${styles.navMenu} ${styles.active}` : `${styles.navMenu}`
        // }
        >
          <li className={styles.navItem}>
            <Link
              to="/accueil"
              className={styles.navLinks}
              onClick={fermetureMenuMobile}
            >
              Accueil
            </Link>
          </li>
          <li className={styles.navItem}>
            <Link
              to="/a_propos"
              className={styles.navLinks}
              onClick={fermetureMenuMobile}
            >
              A propos
            </Link>
          </li>
          <li className={styles.navItem}>
            <Link
              to="/projet"
              className={styles.navLinks}
              onClick={fermetureMenuMobile}
            >
              Mes Projet
            </Link>
          </li>{" "}
          <li className={styles.navItem}>
            <Link
              to="/portfolio"
              className={styles.navLinks}
              onClick={fermetureMenuMobile}
            >
              Portfolio
            </Link>
          </li>
          <li className={styles.navItem}>
            <Link
              to="/mon_cv"
              className={styles.navLinks}
              onClick={fermetureMenuMobile}
            >
              Mon CV
            </Link>
          </li>
        </ul>
      </nav>
    </>
  );
}
