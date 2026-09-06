<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;

/**
 * Formats HTML output for documentation display.
 *
 * The formatter converts compact HTML into a readable
 * indented representation while preserving the structure
 * of nested elements.
 *
 * @package RedSky\Html\Documentation
 */
class HtmlFormatter
{
    /**
     * Formats an HTML string for documentation display.
     *
     * @param string $html
     *
     * @return string
     */
    public function format(
        string $html
    ): string {
        $html = trim($html);

        if ($html === '') {
            return '';
        }

        $dom = new \DOMDocument();

        libxml_use_internal_errors(true);

        $dom->loadHTML(
            '<?xml encoding="UTF-8">' . $html,
            LIBXML_HTML_NOIMPLIED
            | LIBXML_HTML_NODEFDTD
        );

        libxml_clear_errors();

        $dom->preserveWhiteSpace = false;

        $output = $this->formatNodes(
            $dom->childNodes,
            0
        );

        return trim($output);
    }

    /**
     * Formats DOM nodes recursively.
     *
     * @param \DOMNodeList $nodes
     * @param int $level
     *
     * @return string
     */
    private function formatNodes(
        \DOMNodeList $nodes,
        int $level
    ): string {
        $output = '';

        foreach ($nodes as $node) {
            $output .= $this->formatNode(
                $node,
                $level
            );
        }

        return $output;
    }

    /**
     * Formats a single DOM node.
     *
     * @param \DOMNode $node
     * @param int $level
     *
     * @return string
     */
    private function formatNode(
        \DOMNode $node,
        int $level
    ): string {
        if ($node instanceof \DOMText) {
            return trim($node->nodeValue);
        }

        if (!$node instanceof \DOMElement) {
            return '';
        }

        $indent = str_repeat('    ', $level);

        $output = $indent . '<' . $node->nodeName;

        if ($node->hasAttributes()) {
            foreach ($node->attributes as $attribute) {
                $output .= sprintf(
                    ' %s="%s"',
                    $attribute->nodeName,
                    htmlspecialchars(
                        $attribute->nodeValue,
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                );
            }
        }

        if ($this->isVoidElement($node)) {
            return $output . '>';
        }

        $children = $node->childNodes;

        if ($children->length === 0) {
            return $output . '></' . $node->nodeName . '>';
        }

        $hasElementChildren = $this->hasElementChildren($node);

        if (!$hasElementChildren) {
            $content = trim($node->textContent);

            return $output
                . '>'
                . htmlspecialchars(
                    $content,
                    ENT_NOQUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                )
                . '</'
                . $node->nodeName
                . '>';
        }

        $output .= ">\n";

        foreach ($children as $child) {
            if ($child instanceof \DOMText && trim($child->nodeValue) === '') {
                continue;
            }

            $output .= $this->formatNode(
                $child,
                $level + 1
            );

            $output .= "\n";
        }

        $output .= $indent
            . '</'
            . $node->nodeName
            . '>';

        return $output;
    }

    /**
     * Determines whether an element has child elements.
     *
     * @param \DOMElement $element
     *
     * @return bool
     */
    private function hasElementChildren(
        \DOMElement $element
    ): bool {
        foreach ($element->childNodes as $child) {
            if ($child instanceof \DOMElement) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determines whether an element is a void HTML element.
     *
     * @param \DOMElement $element
     *
     * @return bool
     */
    private function isVoidElement(
        \DOMElement $element
    ): bool {
        return in_array(
            strtolower($element->nodeName),
            [
                'area',
                'base',
                'br',
                'col',
                'embed',
                'hr',
                'img',
                'input',
                'link',
                'meta',
                'param',
                'source',
                'track',
                'wbr',
            ],
            true
        );
    }
}