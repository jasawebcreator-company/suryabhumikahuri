<style>
	:root {
  --primtext: 'Manrope', sans-serif;
  --subtext: 'DM Sans', sans-serif;
  --colors: #1a242b;
  --color2: #c9a55c;
  --color3: #182127;
  --color4: #e0c58a;
  --color5: #f8f8f5;
  --color6: #f4f2ed;
  --color7: #1a242b;
  --color8: #667178;
  --color9: #e3e4e0;
  --color10: #ffffff;
  --header-height: 90px;
}

* {
  box-sizing: border-box;
}

html {
  scroll-padding-top: 90px;
}

html.lenis,
html.lenis body {
  height: auto;
}

.lenis.lenis-smooth {
  scroll-behavior: auto !important;
}

body {
  margin: 0;
  color: var(--color7);
  font-family: var(--subtext);
  background: var(--color5);
  overflow-x: hidden;

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: var(--primtext);
  }

  img {
    display: block;
    max-width: 100%;
  }

  a {
    text-decoration: none;

    &:hover {
      text-decoration: none;
    }
  }

  button,
  input,
  textarea,
  select {
    font: inherit;
  }

  ::selection {
    background: #c0b27f;
    color: #202216;
  }
}

.container-global {
  width: 100%;
  max-width: 1320px;
  padding: 5rem 2rem;
  margin-inline: auto;

  @media (max-width: 767.98px) {
    padding: 3.5rem 1.25rem;
  }
}

.section-header {
  margin-bottom: 2.75rem;

  .section-eyebrow {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 26px;
    color: #a8853e;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2.1px;
    text-transform: uppercase;

    &::before {
      content: "";
      display: block;
      width: 36px;
      height: 1px;
      flex: none;
      background: currentColor;
    }
  }

  .section-title {
    max-width: 750px;
    margin: 0 0 24px;
    font-family: var(--primtext);
    font-size: clamp(34px, 3.6vw, 57px);
    font-weight: 800;
    line-height: 1.22;
    letter-spacing: -2.5px;

    span {
      color: #a8853e;
    }

    @media (max-width: 767.98px) {
      letter-spacing: -1.5px;
      font-size: clamp(34px, 9vw, 46px);
    }
  }

  .section-desc {
    max-width: 560px;
    margin: 0;
    color: #667178;
    font-size: 14px;
    line-height: 1.9;
  }

  &.is-center {
    text-align: center;

    .section-eyebrow {
      justify-content: center;
    }

    .section-title,
    .section-desc {
      margin-inline: auto;
    }
  }

  &.is-light {
    .section-eyebrow {
      color: var(--color4);
    }

    .section-title {
      color: var(--color10);

      span {
        color: #d9bd7f;
      }
    }

    .section-desc {
      color: #b9c2c6;
    }
  }
}

.btn-main {
  display: inline-flex;
  align-items: center;
  justify-content: space-between;
  gap: 32px;
  padding: 18px 23px;
  border: 0;
  font-family: var(--primtext);
  font-size: 12px;
  font-weight: 800;
  line-height: 1.3;
  transition: background 0.25s, color 0.25s, transform 0.25s;

  &:hover {
    transform: translateY(-3px);
  }

  &.is-gold {
    background: var(--color2);
    color: #151d22;

    &:hover {
      background: var(--color4);
      color: #151d22;
    }
  }

  &.is-dark {
    background: var(--colors);
    color: var(--color10);

    &:hover {
      background: #29353c;
      color: var(--color10);
    }
  }
}

.text-link {
  display: inline-flex;
  align-items: center;
  gap: 30px;
  padding-bottom: 10px;
  border-bottom: 1px solid #a6a895;
  color: var(--colors);
  font-size: 12px;
  font-weight: 800;
  transition: gap 0.2s, color 0.2s;

  &:hover {
    gap: 38px;
    color: #a8853e;
  }
}

.product-card {
  position: relative;
  display: block;
  height: 460px;
  background: #cfd4d6;
  color: var(--color10);
  overflow: hidden;
  isolation: isolate;
  transition: transform 0.35s, box-shadow 0.35s;

  &:hover {
    color: var(--color10);
    transform: translateY(-5px);
    box-shadow: 0 14px 35px rgba(24, 33, 39, 0.13);

    img {
      transform: scale(1.055);
    }

    .product-link i {
      transform: translate(3px, -3px);
    }
  }

  img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s;
  }

  .product-shade {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(24, 33, 39, 0.32), rgba(24, 33, 39, 0.02) 30%, rgba(11, 19, 13, 0.1) 48%, rgba(13, 20, 15, 0.92) 100%);
  }

  .product-top,
  .product-bottom {
    position: absolute;
    left: 25px;
    right: 25px;
    z-index: 1;
  }

  .product-top {
    top: 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1.6px;
    text-transform: uppercase;

    .product-plus {
      display: grid;
      place-items: center;
      width: 31px;
      height: 31px;
      border: 1px solid rgba(255, 255, 255, 0.75);
      font-size: 12px;
    }
  }

  .product-bottom {
    bottom: 25px;

    h3 {
      margin-bottom: 11px;
      font-size: 23px;
      font-weight: 800;
      letter-spacing: -0.7px;
    }

    p {
      max-width: 290px;
      min-height: 40px;
      margin-bottom: 17px;
      color: #e3e4e0;
      font-size: 12px;
      line-height: 1.7;
    }

    .product-link {
      display: inline-flex;
      align-items: center;
      gap: 15px;
      padding-bottom: 5px;
      border-bottom: 1px solid rgba(224, 197, 138, 0.65);
      color: var(--color4);
      font-size: 11px;
      font-weight: 800;

      i {
        transition: transform 0.3s;
      }
    }
  }

  @media (max-width: 767.98px) {
    height: 430px;
  }

  @media (max-width: 420px) {
    height: 400px;
  }
}

.service-card {
  position: relative;
  display: flex;
  flex-direction: column;
  height: 100%;
  background: var(--color10);
  color: var(--color7);
  border: 1px solid var(--color9);
  overflow: hidden;
  transition: transform 0.3s, box-shadow 0.3s;

  &:hover {
    color: var(--color7);
    transform: translateY(-4px);
    box-shadow: 0 14px 35px rgba(24, 33, 39, 0.1);

    .service-media img {
      transform: scale(1.06);
      filter: none;
    }

    .service-link i {
      transform: translate(3px, -3px);
    }
  }

  .service-media {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: var(--color6);

    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: saturate(0.85);
      transition: transform 0.6s, filter 0.6s;
    }

    .service-index {
      position: absolute;
      top: 18px;
      left: 22px;
      z-index: 1;
      padding: 6px 10px;
      background: var(--color10);
      color: #a8853e;
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 2px;
    }

    .service-symbol {
      position: absolute;
      top: 14px;
      right: 16px;
      z-index: 1;
      display: grid;
      place-items: center;
      width: 31px;
      height: 31px;
      background: var(--color10);
      color: var(--colors);
      font-size: 12px;
    }
  }

  .service-body {
    display: flex;
    flex: 1;
    flex-direction: column;
    padding: 26px 26px 24px;

    h3 {
      margin-bottom: 12px;
      font-size: 20px;
      font-weight: 800;
      letter-spacing: -0.6px;
      line-height: 1.35;
    }

    p {
      margin-bottom: 24px;
      color: #667178;
      font-size: 12px;
      line-height: 1.8;
    }

    .service-excerpt {
      display: -webkit-box;
      -webkit-box-orient: vertical;
      -webkit-line-clamp: 3;
      line-clamp: 3;
      overflow: hidden;
    }

    .service-link {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: auto;
      padding-top: 17px;
      border-top: 1px solid var(--color9);
      color: var(--colors);
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.2px;

      i {
        font-size: 12px;
        transition: transform 0.3s;
      }
    }
  }
}

.project-card {
  position: relative;
  display: block;
  height: 420px;
  background: #334049;
  color: var(--color10);
  overflow: hidden;
  isolation: isolate;

  &:hover {
    color: var(--color10);

    img {
      transform: scale(1.045);
    }

    .project-meta h3 {
      color: var(--color4);
    }
  }

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: saturate(0.82);
    transition: transform 0.6s;
  }

  .project-shade {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 30%, rgba(17, 25, 20, 0.89));
  }

  .project-meta {
    position: absolute;
    left: 30px;
    right: 20px;
    bottom: 28px;
    z-index: 1;

    span {
      color: #e0c58a;
      font-size: 10px;
      font-weight: 800;
      letter-spacing: 1.7px;
      text-transform: uppercase;
    }

    h3 {
      margin: 12px 0 5px;
      font-size: 25px;
      font-weight: 800;
      letter-spacing: -0.8px;
      transition: color 0.3s;
    }

    p {
      margin: 0;
      color: #d3dadd;
      font-size: 12px;
    }
  }

  @media (max-width: 767.98px) {
    height: 350px;

    .project-meta h3 {
      font-size: 22px;
    }
  }
}

.blog-card {
  display: flex;
  flex-direction: column;
  height: 100%;
  background: var(--color10);
  color: var(--color7);
  overflow: hidden;
  transition: transform 0.35s, box-shadow 0.35s;

  &:hover {
    color: var(--color7);
    transform: translateY(-5px);
    box-shadow: 0 14px 35px rgba(24, 33, 39, 0.1);

    .blog-media img {
      transform: scale(1.055);
    }

    .blog-body h3 {
      color: #a8853e;
    }

    .blog-more i {
      transform: translate(3px, -3px);
    }
  }

  .blog-media {
    height: 230px;
    overflow: hidden;
    background: var(--color6);

    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: saturate(0.85);
      transition: transform 0.6s;
    }
  }

  .blog-body {
    display: flex;
    flex: 1;
    flex-direction: column;
    padding: 26px 26px 24px;

    .blog-meta {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 14px;
      color: #a8853e;
      font-size: 10px;
      font-weight: 800;
      letter-spacing: 1.6px;
      text-transform: uppercase;

      .dot {
        width: 3px;
        height: 3px;
        border-radius: 50%;
        background: currentColor;
      }
    }

    h3 {
      margin-bottom: 12px;
      font-size: 19px;
      font-weight: 800;
      letter-spacing: -0.5px;
      line-height: 1.4;
      transition: color 0.3s;
    }

    p {
      margin-bottom: 22px;
      color: #667178;
      font-size: 13px;
      line-height: 1.8;
    }

    .blog-more {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: auto;
      padding-top: 16px;
      border-top: 1px solid var(--color9);
      color: var(--colors);
      font-size: 11px;
      font-weight: 800;

      i {
        font-size: 12px;
        transition: transform 0.3s;
      }
    }
  }
}

</style>