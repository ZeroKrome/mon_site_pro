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
            className={clique ? `fas fa-times` : `fas fa-bars`}
          />
        </div>
        <ul
          className={
            clique ? `${styles.navMenu} ${styles.active}` : `${styles.navMenu}`
          }
        >
          <li className={styles.navItem}>
            <Link
              to="/boutique"
              className={styles.navLinks}
              onClick={fermetureMenuMobile}
            >
              Boutique
            </Link>
          </li>
        </ul>
      </nav>
    </>
  );
}
