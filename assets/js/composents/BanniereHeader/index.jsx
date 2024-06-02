import React from "react";
import styles from "./style.module.scss";
import imageFacebook from "../../../../public/images/icones/iconefacebook.png";
import imageLinkedn from "../../../../public/images/icones/iconelinkedn.png";
import imageGitHub from "../../../../public/images/icones/iconegithub.svg";
import { Link } from "react-router-dom";

export default function BanniereHeader() {
  return (
    <>
      <div className={styles.banniereHeader}></div>
      <div className={styles.fondGris}></div>
      <div className={styles.banniereInfos}>
        <p>Retrouvez moi sur les réseaux sociaux</p>
        <a
          href="https://www.facebook.com/RugbyClubBethunois/?locale=fr_FR"
          target="_blank"
        >
          <div
            className={styles.icone}
            style={{ backgroundImage: `url(${imageFacebook})` }}
          ></div>
        </a>
        <a
          href="https://www.linkedin.com/in/mathieu-lemaire-8b394a294/"
          target="_blank"
        >
          <div
            className={styles.icone}
            style={{ backgroundImage: `url(${imageLinkedn})` }}
          ></div>
        </a>
        <a href="https://github.com/ZeroKrome" target="_blank">
          <div
            className={styles.icone}
            style={{ backgroundImage: `url(${imageGitHub})` }}
          ></div>
        </a>
        <Link to="/contact">
          <button className={styles.boutonContact}>Contact</button>
        </Link>
      </div>
      <Link to="/" className={styles.logoLink}>
        <div className={styles.logo}></div>
      </Link>
    </>
  );
}
