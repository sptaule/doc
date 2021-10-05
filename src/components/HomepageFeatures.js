import React from 'react';
import clsx from 'clsx';
import styles from './HomepageFeatures.module.css';

const FeatureList = [
  {
    title: 'Facile à prendre en main',
    Svg: require('../../static/img/undraw_docusaurus_mountain.svg').default,
    description: (
      <>
        Scuba a été conçue pour que la gestion des clubs de plongée soit intuitive.
      </>
    ),
  },
  {
    title: 'Du temps économisé',
    Svg: require('../../static/img/undraw_docusaurus_tree.svg').default,
    description: (
      <>
        Des outils comme la génération des fiches de plongée sont à votre disposition et automatisés au maximum !
      </>
    ),
  },
  {
    title: 'Un design adapté',
    Svg: require('../../static/img/undraw_docusaurus_react.svg').default,
    description: (
      <>
        Vous aurez la possibilité de modifier les éléments généraux de votre site :<br/> images, couleurs, affichage...
      </>
    ),
  },
];

function Feature({Svg, title, description}) {
  return (
    <div className={clsx('col col--4')}>
      <div className="text--center">
        <Svg className={styles.featureSvg} alt={title} />
      </div>
      <div className="text--center padding-horiz--md">
        <h3>{title}</h3>
        <p>{description}</p>
      </div>
    </div>
  );
}

export default function HomepageFeatures() {
  return (
    <section className={styles.features}>
      <div className="container">
        <div className="row">
          {FeatureList.map((props, idx) => (
            <Feature key={idx} {...props} />
          ))}
        </div>
      </div>
    </section>
  );
}
