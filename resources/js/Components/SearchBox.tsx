import React from "react";

interface SearchBoxProps {
    searchQuery: string;
}

const SearchBox: React.FC<SearchBoxProps> = ({searchQuery}) => (
    <>
        <input type="text"/>
        <input type="submit"/>
    </>
);

export default SearchBox;
