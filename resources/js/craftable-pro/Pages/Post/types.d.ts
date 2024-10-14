import type { UploadedFile } from "craftable-pro/types";

export type Post = {
    id: string | number; 
title: string; 
slug: string; 
content: string; 
date: string; 
created_at: string; 
updated_at: string
    media?: UploadedFile[];
};

export type PostForm = {
    title: string; 
slug: string; 
content: string; 
date: string; 
Cover: Array<UploadedFile>
};
