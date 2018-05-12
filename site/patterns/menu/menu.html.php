<div id="menu-overlay"></div>

<nav id="menu">
  <ul>
    <li>
      <a href="/"<?= $page->isHomePage() ? ' class="active"' : '' ?>>
        <span class="text">ACCUEIL</span>
      </a>
    </li>
    <li>
      <a href="/actualites"<?= $page->uid() === 'actualites' ? ' class="active"' : '' ?>>
        ACTUALITÉS
      </a>
    </li>
    <li>
      <a href="/articles"<?= $page->uid() === 'articles' ? ' class="active"' : '' ?>>
        ARTICLES
      </a>
    </li>
    <li>
      <a href="/les-quiz"<?= $page->uid() === 'les-quiz' ? ' class="active"' : '' ?>>
        LES QUIZ
      </a>
    </li>
    <li>
      <a href="/l-association"<?= $page->uid() === 'l-association' ? ' class="active"' : '' ?>>
        L'ASSOCIATION
      </a>
    </li>
    <li>
      <a href="/nos-partenaires"<?= $page->uid() === 'nos-partenaires' ? ' class="active"' : '' ?>>
        NOS PARTENAIRES
      </a>
    </li>
  </ul>
    <?php /* <a href="#" class="i-facebook icon"></a> */ ?>
</nav>
