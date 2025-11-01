# 📌 Padrão de Branches e Commits — Ecomets E-commerce Base

## 🔹 Branches principais

-   **main** → branch de produção. Só recebe merge de `release/*` e `hotfix/*`.
-   **develop** → branch de desenvolvimento. Toda feature vai pra cá primeiro.

## 🔹 Branches de suporte (GitFlow)

-   **feature/ECM-000X-descricao**

    -   Para novas features/tarefas.
    -   Base: develop.
    -   Nome sempre começa com o código da task do Trello (ECM-000X).
    -   Ex: feature/ECM-0005-crud-produtos.

-   **release/x.y.z**

    -   Preparação de uma nova versão.
    -   Criada a partir de develop.
    -   Ex: release/1.0.0.
    -   Aqui rola revisão final, ajustes menores, bump de versão.

-   **hotfix/x.y.z**
    -   Para corrigir bug crítico em produção.
    -   Base: main.
    -   Merge volta para main **e** develop.
    -   Ex: hotfix/1.0.1.

## 🔹 Branches extras (Ambientes)

-   **staging**

    -   Espelha o que está em homologação.
    -   Recebe merge das branches release/\*.
    -   É o que os testes internos/QA usam para validar antes de ir para produção.

-   **lastprod**
    -   Cópia da última versão que está em produção.
    -   Útil como fallback: se der ruim no deploy, dá para comparar ou reverter fácil.
    -   Sempre atualizado no deploy de produção:
        ```bash
        git checkout main
        git pull origin main
        git push origin main:lastprod
        ```

---

## 🔹 Padrão de Commits

Usaremos uma variação do Conventional Commits adaptado para incluir o ID da task (ECM-000X).

**Estrutura:**

```
<tipo>(ECM-000X): descrição curta
```

**Tipos permitidos:**

-   feat → nova feature.
-   fix → correção de bug.
-   chore → manutenção, configs, dependências.
-   docs → documentação/README.
-   style → ajustes visuais, sem alterar lógica.
-   refactor → refatoração sem mudar comportamento.
-   test → criação/alteração de testes.
-   perf → melhorias de performance.

**Exemplos:**

```
feat(ECM-0001): criar migração de clientes
fix(ECM-0007): corrigir validação de email no cadastro
docs(ECM-0003): adicionar instruções de setup no README
chore(ECM-0002): configurar Tailwind no projeto
```

---

## 🔹 Fluxo de trabalho (GitFlow + staging/lastprod)

1. Criar uma branch de feature a partir de develop:

    ```bash
    git checkout develop
    git pull origin develop
    git checkout -b feature/ECM-0001-criar-migracao-clientes
    ```

2. Commitar sempre com o padrão acima.
3. Abrir PR para develop e pedir revisão.
4. Quando for preparar versão:

    ```bash
    git checkout develop
    git checkout -b release/1.0.0
    ```

    → Finalizar ajustes, mergear em staging.

5. Após validação em staging:

    - Merge release/1.0.0 → main
    - Criar tag da versão no main: v1.0.0
    - Atualizar lastprod para espelhar a main

6. Para bug crítico em produção:
    ```bash
    git checkout main
    git checkout -b hotfix/1.0.1
    ```
    → Corrigir, mergear em main e develop.

---

## 🔹 Exemplo visual do fluxo

```
feature/ECM-0007 ──┐
                   ├── develop ──┐
feature/ECM-0008 ──┘             │
                                 ├── release/1.0.0 ── staging
                                 │
                                 └── main ── lastprod (tag v1.0.0)
```

---

## 🔹 Tags

-   Sempre que uma release for para produção, criar tag no formato vX.Y.Z.
    -   Ex: v1.0.0, v1.1.0, v1.1.1.
