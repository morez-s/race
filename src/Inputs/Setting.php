<?php

class Setting
{
    protected function getStringInput(string $field): string
    {
        echo "Enter the " . $field . ": ";
        $input = cli\input();
        return (string)$input;
    }

    protected function getIntegerInput(string $field): int
    {
        echo "Enter the " . $field . ": ";
        $input = cli\input();
        return (int)$input;
    }

    protected function getItemFromMenu(array $menu, string $message): mixed
    {
        cli\line();
        $choice = \cli\menu($menu, null, $message);
        return $choice;
    }
}