import React, {useState} from "react";
import {Inertia} from "@inertiajs/inertia";

interface SearchBoxProps {
    searchQuery: string;
}

const SearchBox: React.FC<SearchBoxProps> = (props:SearchBoxProps) => {
    const [searchQuery, setSearchQuery] = useState<string>("");
    return(
        <>
            <input type="text"
                   onChange={(e)=>{
                       setSearchQuery(e.target.value);
                   }}
            />
            <input type="submit"
                   onClick={()=>{
                       Inertia.get("/", {"searchQuery": searchQuery},{
                           onError: (errors) => {
                               console.log("error");
                            console.log(errors.file);
                           }
                       })
                   }}
            />
        </>
        )
}
export default SearchBox;
