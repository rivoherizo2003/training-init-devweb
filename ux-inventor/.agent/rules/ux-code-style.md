---
trigger: always_on
glob: "**/*.{html,css,js}"
description: "Best practices for integrating Figma designs into HTML/CSS"
---

# Figma to HTML/CSS Integration Best Practices

## 1. Design Token Extraction (The Foundation)

Before writing a single line of layout code, extract the design "DNA" into CSS Custom Properties (Variables).

- **Colors**: Define semantic names over descriptive ones where possible.
  - _Bad:_ `--blue: #007bff;`
  - _Good:_ `--primary-color: #007bff;`, `--text-secondary: #6c757d;`
- **Typography**: Create utility classes or mixins for specific text styles (headings, body text, captions) exactly as defined in Figma's text styles.
  - Example: `.text-xl-bold`, `.display-sm-semibold`
- **Spacing**: If the design uses a grid (e.g., 8pt grid), define spacing variables.
  - `--spacing-sm: 8px;`, `--spacing-md: 16px;`

## 2. Layout Translation (Auto Layout is Key)

Figma's **Auto Layout** maps directly to CSS Flexbox.

- **Direction**:
  - `↓` (Vertical) = `flex-direction: column;`
  - `→` (Horizontal) = `flex-direction: row;`
- **Resizing**:
  - `Hug contents` = `width: fit-content;` or default block behavior.
  - `Fill container` = `flex: 1;` or `width: 100%;`
  - `Fixed width` = `width: [value]px;`
- **Spacing & Alignment**:
  - `Space between items` = `gap: [value]px;`
  - `Padding` = `padding: [value]px;`
  - `Alignment` (e.g., center, top-left) = `align-items` and `justify-content`.

## 3. Component - Based Thinking

Identify repeating UI patterns in Figma (Components) and build them as reusable HTML/CSS components.

- Don't just copy-paste CSS for every button. Create a `.btn` base class and modifiers like `.btn--primary`, `.btn--outline`.
- Ensure components are responsive by default. Avoid fixed widths (`width: 300px`) on main containers; use `max-width` and percentages/flex-grow instead.

## 4. Typography & Visuals

- **Line Height**: Figma's line-height behavior is specific. Ensure you use the unit-less or relative line-height in CSS for better scaling (e.g., `line-height: 1.5;`).
- **Box Shadow**: Copying box-shadows directly from Figma is safe, but check if the alpha values (transparency) need conversion to `rgba`.

## 5. Assets & Images

- **SVG**: Export icons and simple shapes as SVG code (inline HTML) to allow CSS styling (hover states, fill color changes).
- **Images**: Export photos as `WebP` or `JPG`. Use `@2x` exports for retina displays if necessary, but prioritize optimized file sizes.
- **Clean Up**: Do not export hidden layers or background colors that should be handled by CSS.

## 6. Perfect Pixel vs. Optical Balance

- While we aim for pixel perfection, the browser renders text differently than design tools.
- Prioritize **Visual Layout & Alignment** over exact pixel matching if the font rendering causes slight deviations.
- Use browser developer tools to fine-tune margins and padding to match the _feel_ of the design.
